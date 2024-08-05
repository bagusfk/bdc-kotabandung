<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Your Address') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your City and Province.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update.address') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-4">
            <label for="province" class="block text-gray-700">Province</label>
            <select id="province" class="block w-full mt-1 border border-gray-300 rounded-lg form-select">
                <option value="">Select Province</option>
                @foreach($provinces as $province)
                    <option value="{{ $province->province_id }}"
                        {{  (Auth::user()->city_id != null ? (Auth::user()->cities->province_id == null ? ''
                        : ($province->province_id == Auth::user()->cities->province_id ? 'selected'
                        : ''))
                        : ''
                        )}} >
                        {{ $province->province }}
                    </option>
                    {{-- <option value="{{ $province->province_id }}">{{ $province->province }}</option> --}}
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="city" class="block text-gray-700">City</label>
            <select id="city" name="city_id" class="block w-full mt-1 border border-gray-300 rounded-lg form-select">
                @if ($user->city_id)
                    @foreach($cities as $city)
                        @if ($city->province_id === Auth::user()->cities->province_id)
                            <option value="{{ $city->city_id }}" {{ $city->city_id == Auth::user()->city_id? 'selected' : ''}}>{{ $city->type }} {{ $city->city_name }}</option>
                        @endif
                    @endforeach
                @else
                    <option value="">Select City</option>
                @endif
            </select>
        </div>
        <div class="mb-4">
            <label for="address" class="block text-gray-700">Alamat Lengkap <br><span class="text-sm text-gray-400">*nama jalan, blok, rt/rw, no rumah, desa/kelurahan, & kecamatan</span></label>
            <textarea name="address" id="address" cols="30" rows="3" class="block w-full mt-1 border border-gray-300 rounded-lg" placeholder="Masukan alamat lengkap">{{ $user->address }}</textarea>
        </div>
        <div class="flex items-center gap-4">
            {{-- <x-primary-button>{{ __('Save') }}</x-primary-button> --}}
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
            @if (session('status') === 'address-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Address Saved.') }}</p>
            @endif
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#province').change(function() {
                const province = $(this).val();
                // console.log("Selected province: ", province);
                // $('#city').empty();
                // $('#city').append('<option value="">Select apa hayoo</option>');
                if (province) {
                    $.ajax({
                        url: '/profile/' + encodeURIComponent(province) ,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#city').empty();
                            $('#city').append('<option value="">Select city</option>');
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="'+ value.id +'">'+value.type+' '+ value.city_name +'</option>');
                                // console.log("Selected cities: ", value.id);
                            });
                        }
                    });
                } else {
                    $('#city').empty();
                    $('#city').append('<option value="">Select City</option>');
                }
            });
        });
    </script>
</section>
