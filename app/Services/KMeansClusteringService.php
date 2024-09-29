<?php

namespace App\Services;

class KMeansClusteringService
{
    private $data;
    private $clusters;
    private $centroids;

    public function __construct($data, $clusters = 3)
    {
        $this->data = $data;
        $this->clusters = $clusters;
    }

    public function run()
    {
        // Inisialisasi centroid
        $this->centroids = $this->initializeCentroids();

        // Iterasi sampai centroid stabil (tidak berubah)
        while (true) {
            // 1. Assign produk ke cluster terdekat
            $clusters = $this->assignClusters();

            // 2. Hitung centroid baru
            $newCentroids = $this->calculateCentroids($clusters);

            // Jika centroid tidak berubah, hentikan iterasi
            if ($this->centroids === $newCentroids) {
                break;
            }

            // Update centroid
            $this->centroids = $newCentroids;
        }

        return $clusters;
    }

    private function initializeCentroids()
    {
        // Ambil index centroid secara acak
        return array_rand($this->data, $this->clusters);
    }

    private function assignClusters()
    {
        $clusters = [];

        foreach ($this->data as $index => $product) {
            $distances = [];

            // Hitung jarak produk ke setiap centroid
            foreach ($this->centroids as $centroidIndex) {
                $distances[] = $this->calculateDistance($product['sales'], $this->data[$centroidIndex]['sales']);
            }

            // Tentukan kluster dengan jarak terdekat
            $clusterIndex = array_keys($distances, min($distances))[0];
            $clusters[$clusterIndex][] = $product;
        }

        return $clusters;
    }

    private function calculateDistance($sales1, $sales2)
    {
        // Hitung jarak Euclidean
        return abs($sales1 - $sales2);
    }

    private function calculateCentroids($clusters)
    {
        $centroids = [];

        foreach ($clusters as $cluster) {
            $sum = 0;

            foreach ($cluster as $product) {
                $sum += $product['sales'];
            }

            // Hitung rata-rata
            $average = $sum / count($cluster);

            // Cari produk terdekat dengan rata-rata dan gunakan sebagai centroid baru
            $centroids[] = array_search($this->findClosestProduct($average, $cluster), $this->data);
        }

        return $centroids;
    }

    private function findClosestProduct($average, $cluster)
    {
        $closest = null;
        $minDistance = PHP_INT_MAX;

        foreach ($cluster as $product) {
            $distance = $this->calculateDistance($product['sales'], $average);
            if ($distance < $minDistance) {
                $minDistance = $distance;
                $closest = $product;
            }
        }

        return $closest;
    }
}
