@extends('weblayouts.app')
@section('title')
    {{ 'Home' }}
@endsection
@section('content')

<header class="w-full" style="background: url('{{ URL('assets/img/header/header.png') }}')
 no-repeat center/cover;">
    <div class="flex justify-center items-center py-24 xl:pt-10 xl:pb-24 2xl:pb-28">
        <div class="flex flex-col items-center gap-5">
            <div class="py-4 px-8 font-semibold text-2xl" style="background: url('{{ asset('assets/img/header/bg.png') }}') no-repeat center/contain;">
                7 Nights
            </div>
            <h2 class="text-5xl md:text-7xl font-bold text-[#110928]">Umrah Package</h2>
            <div class="flex items-center gap-2 pt-5 sm:pt-0">
                <div class="py-2 px-7 md:text-xl flex justify-center items-center text-center relative">
                    <img class="absolute" src="{{ URL("assets/img/header/bg_1.png") }}" alt="bg">
                    <p>Return Flight<br>
                        04 Nights Makkah</p>
                </div>
                <div class="py-2 px-7 md:text-xl flex justify-center items-center text-center relative">
                    <img class="absolute" src="{{ URL("assets/img/header/bg_1.png") }}" alt="bg">
                    <p> Visa Included <br>
                        03 nights Madinah</p>
                </div>
            </div>
            <div class="flex items-center gap-4 md:pt-0 pt-5">
                <div class="h-32 w-32 md:w-36 md:h-36 text-sm text-white bg-[#09B175] rounded-full outline-white outline-none -outline-offset-8 flex flex-col items-center justify-center">
                    <p>Starting from</p>
                    <p class="font-bold text-lg md:text-3xl">£1275</p>
                </div>
                <div class="flex flex-col gap-2 text-center">
                    <img class="object-cover" src="{{ URL('assets/img/partner/partner.png') }}" alt="partner">
                    <hr class="bg-black border-black">
                    <a href="#" class="text-xl font-semibold">+92 123 456 7890</a>
                </div>
            </div>
        </div>

    </div>
</header>

<section>
    <div class="container mx-auto px-5 lg:px-10 xl:px-24 py-2">

        <div class="translate-y-[-4.25rem] shadow-[0px_4px_50px_0px_#00000033] rounded-xl xl:rounded-[20px] xl:h-[250px]">
            <div class="xl:h-[60px] py-3 xl:py-0 bg-[#E1C844] rounded-t-xl xl:rounded-t-[20px] px-5 lg:px-8 flex items-center">
                <p class="text-2xl font-semibold">Get Custom Quote</p>
            </div>
            <form action="{{ route('form.submit') }}" method="POST" class="xl:h-[190px] bg-white rounded-b-xl xl:rounded-b-[20px] px-5 lg:px-8 py-6 flex flex-col justify-between">
              @csrf
                <div class="flex sm:flex-nowrap flex-wrap items-center gap-3 md:gap-5">
                    <div class="mb-5 w-full">
                        <label for="first_name" class="block mb-1 text-sm font-medium text-[#808080] ">Your Name</label>
                        <input type="text" id="first_name" name="first_name" class=" bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5" placeholder="Enter Your Name" required />
                    </div>
                    <input type="hidden" id="type" name="type" value="custom quote">

                    <div class="mb-5 w-full">
                        <label for="email" class="block mb-1 text-sm font-medium text-[#808080] ">Your Email</label>
                        <input type="email" id="email" name="email" class=" bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5" placeholder="Enter Email Address" required />
                    </div>
                    <div class="mb-5 w-full relative">
                        <label for="phone_number" class="block mb-1 text-sm font-medium text-[#808080] ">Mobile Number</label>
                        <!-- <input type="number" id="mobile" class=" bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5" placeholder="Enter Phone Number" required /> -->
                        <div class="w-full">
                            <div class="flex items-center">
                                <select id="country_code" name="country_code" class="minimal w-[100px] sm:w-[70px] lg:w-[100px] xl:w-[120px] h-[36.6px] xl:h-[41.6px] bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-l-lg rounded-r-none focus:ring-[#E1C844] focus:border-[#E1C844] block p-2.5">
                                   @foreach($dialCodes as $dialCode)
                                   <option value="{{ $dialCode['code'] }}">+{{ $dialCode['code'] }} {{ $dialCode['iso'] }}</option>
                                    @endforeach
                                </select>
                                <div class="relative w-full">
                                    <input type="number" id="phone_number" name="phone_number" class="h-[36.6px] xl:h-[41.6px] bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-tr-lg rounded-br-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mb-5 w-full">
                        <label for="adults" class="block mb-1 text-sm font-medium text-[#808080] ">Adults</label>
                        <select id="adults" name="adults" class="minimal bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-5 sm:gap-0 sm:flex-nowrap flex-wrap items-center justify-between">
                    <div class="flex items-center">
                        <input id="default-checkbox" type="checkbox" value="" class="!shadow-none sm:w-4 sm:h-4 h-6 w-6  bg-[#F9FAFB] border border-[#D1D5DB] rounded text-blue-600" />
                        <label for="default-checkbox" class="ms-2 text-sm font-normal text-black">I want deals via phone calls and promotions through emails.</label>
                    </div>
                    <button type="submit" class="uppercase text-white bg-[#110928] rounded-full px-6 md:px-10 py-2">Submit Enquiry</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container mx-auto px-5 sm:px-10 xl:px-24 py-2">
        <h2 class="text-[#110928] font-bold text-3xl text-center">Trusted Hajj and Umrah Travel Agency in the UK</h2>
        <div class="md:px-5 xl:px-20 grid grid-cols-2 place-items-center md:flex items-center justify-between flex-wrap md:flex-nowrap md:gap-5 xl:gap-10 py-16">
            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust1.png') }}" alt="trust1">
            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust2.png') }}" alt="trust2">
            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust3.png') }}" alt="trust3">
            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust4.png') }}" alt="trust4">
        </div>
    </div>
</section>

<section class="" style="background: url('{{ URL('assets/img/package/img1.png') }}');">
    <div class="container mx-auto px-5 lg:px-10 xl:px-24 py-8">

        <!-- grid grid-cols-2 gap-10 -->
        <div class="swiper mySwiper">

            <div class="flex flex-col gap-14 sm:gap-0 sm:flex-row items-center justify-center sm:justify-between sm:pr-16 md:pr-24 lg:pr-32 xl:pr-20 py-5">
                <h4 class="text-center sm:text-left text-3xl md:text-4xl font-semibold text-[#110928]">All-Inclusive 5 Star Umrah <br class="sm:hidden"> Packages</h4>
                <div class="relative block">
                    <button class="swiper-button-prev left-[-50px] w-[40px] h-[40px] md:h-[50px] md:w-[50px] flex justify-center items-center rounded-full border-2 border-black bg-white text-black text-xl font-semibold">
                        <svg class="!w-[24px] !h-[24px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                        </svg>
                    </button>
                    <button class="swiper-button-next left-[10px] w-[40px] h-[40px] md:h-[50px] md:w-[50px] flex justify-center items-center rounded-full border-2 border-black bg-black text-white text-xl font-semibold">
                        <svg class="!w-[24px] !h-[24px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="swiper-wrapper py-16">
                @foreach ($packages as $package)
                <div class="swiper-slide text-[#110928] flex flex-col gap-5 items-center bg-white border border-[#C8C8C8] rounded-[20px] py-4 lg:py-7">
                    <div class="py-4 px-4 md:px-8 font-semibold text-2xl space-x-2" style="background: url('{{ asset('assets/img/header/bg.png') }}') no-repeat center/contain;">
                        <span>${{$package->price}}</span><span class="text-sm font-normal">{{$package->nights}} Nights</span>
                    </div>
                    <h4 class="text-2xl md:text-3xl font-semibold text-center">{{$package->name}}</h4>
                    <div class="w-full">
                    <div class="flex justify-center items-center">
                        @php $counter = 0; @endphp
                        @foreach ($package->service as $service)
                            @if ($counter < 2)
                        <div class="flex flex-col items-center gap-2 first:border-r border-[#D9D9D9]">
                            <div class="p-4 md:p-6 flex flex-col items-center">
                                <img class="rounded-full" src="{{ URL($service->image) }}" alt="card1">
                                <div class="text-center">
                                    <h6 class="font-semibold 2xl:text-lg">{{$service->name}}</h6>
                                  <p class="text-sm">Conrad Makkah</p>
                                </div>
                            </div>
                        </div>
                        @php $counter++; @endphp
                        @else
                        @break
                        @endif
                        @endforeach

                    </div>
                    <hr class="w-full h-[1px] bg-transparent border-[#D9D9D9]">
                    </div>
                    <div class="flex justify-between items-center w-full px-4 lg:px-7">
                        <a href="{{ route('packages.showDetails', ['id' => $package->id]) }}" class="space-x-2 font-semibold text-sm md:text-base"><i class="fa-solid fa-phone text-[#E1C844]"></i> +92 123 456 7890</a>
                        <a href="{{ route('packages.showDetails', ['id' => $package->id]) }}" class="bg-[#110928] px-6 md:px-8 py-2 xl:py-3 text-white rounded-full">View Details</a>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section>
    <div class="container mx-auto px-5 lg:px-10 xl:px-24 py-8">

        <div class="flex flex-wrap justify-center items-center gap-3 sm:gap-5 text-[#110928]">
             <button id="link1" onclick="showSection(1)" class="relative group menu-link activeLink">Umrah Packages<span class="absolute bottom-[-5px] left-0 w-0 h-[3px] bg-[#E1C844] transition-all origin-left"></span></button>
             <button id="link1" onclick="showSection(2)" class="relative group menu-link">December Umrah Packages<span class="absolute bottom-[-5px] left-0 w-0 h-[3px] bg-[#E1C844] transition-all origin-left group-hover:w-full"></span></button>
             <button id="link1" onclick="showSection(3)" class="relative group menu-link">Ramadan Umrah Packages<span class="absolute bottom-[-5px] left-0 w-0 h-[3px] bg-[#E1C844] transition-all origin-left group-hover:w-full"></span></button>
        </div>


        <div id="menu1" class="grid lg:grid-cols-2 gap-10 py-10 pt-20">
            @php $counter = 0; @endphp
            @foreach ($packages as $package)
                @if ($counter < 2)
            <div class="text-[#110928] py-5 sm:py-8 px-5 2xl:px-10 rounded-xl md:rounded-[20px] flex flex-col-reverse sm:flex-row items-center justify-between gap-10 sm:gap-0 2xl:gap-10 !bg-contain" style="background: linear-gradient(106.65deg, #E2CD58 1.47%, #F3EED2 44.02%, #F8E8B0 99.29%);">
                <div class="h-full flex flex-col items-center sm:items-start sm:text-left text-center justify-between gap-3">
                    <div class="space-y-1">
                        <h6 class="font-bold text-2xl">{{$package->name}}</h6>
                        <p class="text-lg">{{$package->hotel->name}}</p>
                    </div>
                    <ul class="space-y-2">
                        @foreach ($package->facility as $facility)

                        <li class='flex items-center gap-2'><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                            </svg> <span class='text-sm'>{{$facility->name}}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="flex items-center justify-between w-full sm:w-auto lg:w-full gap-3 2xl:gap-3">
                        <a href="{{ route('packages.showDetails', ['id' => $package->id]) }}" class="space-x-2 font-semibold text-sm"><i class="fa-solid fa-phone text-[#09B175]"></i> +92 123 456 7890</a>
                        <a href="{{ route('packages.showDetails', ['id' => $package->id]) }}" class="w-fit px-4 py-2 text-white bg-[#110928] text-sm rounded-full">View Details</a>
                    </div>
                </div>
                <div class="relative">
                    <img class="h-72 sm:h-56 2xl:h-72 w-72 2xl:w-64" src="{{ URL('assets/img/package/package1.png') }}" alt="qoute">
                    <div class="absolute top-0 right-0 h-20 w-20 2xl:h-24 2xl:w-24 text-sm text-white bg-[#09B175] rounded-full border-[3px] border-white flex flex-col items-center justify-center">
                        <p class="font-bold text-lg 2xl:text-[20px]">£{{$package->price}}</p>
                        <p class="text-sm">{{$package->nights}} Nights</p>
                    </div>
                </div>
            </div>
                    @php $counter++; @endphp
                @else
                    @break
                @endif
            @endforeach

        </div>


    </div>
</section>

{{--<script>--}}
{{--    function showSection(sectionNumber) {--}}

{{--        // Hide all sections--}}
{{--        document.getElementById('menu1').style.display = 'none';--}}
{{--        document.getElementById('menu2').style.display = 'none';--}}
{{--        document.getElementById('menu3').style.display = 'none';--}}
{{--        var links = document.querySelectorAll('.menu-link');--}}
{{--        links.forEach(function(link) {--}}
{{--            link.classList.remove('activeLink');--}}
{{--        });--}}
{{--        document.getElementById('link' + sectionNumber).classList.add('activeLink');--}}

{{--        // Show the selected section--}}
{{--        document.getElementById('menu' + sectionNumber).style.display = 'grid';--}}
{{--    }--}}

{{--    const dialCodes = [{"country":"Afghanistan","code":"93","iso":"AF"},--}}
{{--{"country":"Albania","code":"355","iso":"AL"},--}}
{{--{"country":"Algeria","code":"213","iso":"DZ"},--}}
{{--{"country":"American Samoa","code":"1-684","iso":"AS"},--}}
{{--{"country":"Andorra","code":"376","iso":"AD"},--}}
{{--{"country":"Angola","code":"244","iso":"AO"},--}}
{{--{"country":"Anguilla","code":"1-264","iso":"AI"},--}}
{{--{"country":"Antarctica","code":"672","iso":"AQ"},--}}
{{--{"country":"Antigua and Barbuda","code":"1-268","iso":"AG"},--}}
{{--{"country":"Argentina","code":"54","iso":"AR"},--}}
{{--{"country":"Armenia","code":"374","iso":"AM"},--}}
{{--{"country":"Aruba","code":"297","iso":"AW"},--}}
{{--{"country":"Australia","code":"61","iso":"AU"},--}}
{{--{"country":"Austria","code":"43","iso":"AT"},--}}
{{--{"country":"Azerbaijan","code":"994","iso":"AZ"},--}}
{{--{"country":"Bahamas","code":"1-242","iso":"BS"},--}}
{{--{"country":"Bahrain","code":"973","iso":"BH"},--}}
{{--{"country":"Bangladesh","code":"880","iso":"BD"},--}}
{{--{"country":"Barbados","code":"1-246","iso":"BB"},--}}
{{--{"country":"Belarus","code":"375","iso":"BY"},--}}
{{--{"country":"Belgium","code":"32","iso":"BE"},--}}
{{--{"country":"Belize","code":"501","iso":"BZ"},--}}
{{--{"country":"Benin","code":"229","iso":"BJ"},--}}
{{--{"country":"Bermuda","code":"1-441","iso":"BM"},--}}
{{--{"country":"Bhutan","code":"975","iso":"BT"},--}}
{{--{"country":"Bolivia","code":"591","iso":"BO"},--}}
{{--{"country":"Bosnia and Herzegovina","code":"387","iso":"BA"},--}}
{{--{"country":"Botswana","code":"267","iso":"BW"},--}}
{{--{"country":"Brazil","code":"55","iso":"BR"},--}}
{{--{"country":"British Indian Ocean Territory","code":"246","iso":"IO"},--}}
{{--{"country":"British Virgin Islands","code":"1-284","iso":"VG"},--}}
{{--{"country":"Brunei","code":"673","iso":"BN"},--}}
{{--{"country":"Bulgaria","code":"359","iso":"BG"},--}}
{{--{"country":"Burkina Faso","code":"226","iso":"BF"},--}}
{{--{"country":"Burundi","code":"257","iso":"BI"},--}}
{{--{"country":"Cambodia","code":"855","iso":"KH"},--}}
{{--{"country":"Cameroon","code":"237","iso":"CM"},--}}
{{--{"country":"Canada","code":"1","iso":"CA"},--}}
{{--{"country":"Cape Verde","code":"238","iso":"CV"},--}}
{{--{"country":"Cayman Islands","code":"1-345","iso":"KY"},--}}
{{--{"country":"Central African Republic","code":"236","iso":"CF"},--}}
{{--{"country":"Chad","code":"235","iso":"TD"},--}}
{{--{"country":"Chile","code":"56","iso":"CL"},--}}
{{--{"country":"China","code":"86","iso":"CN"},--}}
{{--{"country":"Christmas Island","code":"61","iso":"CX"},--}}
{{--{"country":"Cocos Islands","code":"61","iso":"CC"},--}}
{{--{"country":"Colombia","code":"57","iso":"CO"},--}}
{{--{"country":"Comoros","code":"269","iso":"KM"},--}}
{{--{"country":"Cook Islands","code":"682","iso":"CK"},--}}
{{--{"country":"Costa Rica","code":"506","iso":"CR"},--}}
{{--{"country":"Croatia","code":"385","iso":"HR"},--}}
{{--{"country":"Cuba","code":"53","iso":"CU"},--}}
{{--{"country":"Curacao","code":"599","iso":"CW"},--}}
{{--{"country":"Cyprus","code":"357","iso":"CY"},--}}
{{--{"country":"Czech Republic","code":"420","iso":"CZ"},--}}
{{--{"country":"Democratic Republic of the Congo","code":"243","iso":"CD"},--}}
{{--{"country":"Denmark","code":"45","iso":"DK"},--}}
{{--{"country":"Djibouti","code":"253","iso":"DJ"},--}}
{{--{"country":"Dominica","code":"1-767","iso":"DM"},--}}
{{--{"country":"Dominican Republic","code":"1-809, 1-829, 1-849","iso":"DO"},--}}
{{--{"country":"East Timor","code":"670","iso":"TL"},--}}
{{--{"country":"Ecuador","code":"593","iso":"EC"},--}}
{{--{"country":"Egypt","code":"20","iso":"EG"},--}}
{{--{"country":"El Salvador","code":"503","iso":"SV"},--}}
{{--{"country":"Equatorial Guinea","code":"240","iso":"GQ"},--}}
{{--{"country":"Eritrea","code":"291","iso":"ER"},--}}
{{--{"country":"Estonia","code":"372","iso":"EE"},--}}
{{--{"country":"Ethiopia","code":"251","iso":"ET"},--}}
{{--{"country":"Falkland Islands","code":"500","iso":"FK"},--}}
{{--{"country":"Faroe Islands","code":"298","iso":"FO"},--}}
{{--{"country":"Fiji","code":"679","iso":"FJ"},--}}
{{--{"country":"Finland","code":"358","iso":"FI"},--}}
{{--{"country":"France","code":"33","iso":"FR"},--}}
{{--{"country":"French Polynesia","code":"689","iso":"PF"},--}}
{{--{"country":"Gabon","code":"241","iso":"GA"},--}}
{{--{"country":"Gambia","code":"220","iso":"GM"},--}}
{{--{"country":"Georgia","code":"995","iso":"GE"},--}}
{{--{"country":"Germany","code":"49","iso":"DE"},--}}
{{--{"country":"Ghana","code":"233","iso":"GH"},--}}
{{--{"country":"Gibraltar","code":"350","iso":"GI"},--}}
{{--{"country":"Greece","code":"30","iso":"GR"},--}}
{{--{"country":"Greenland","code":"299","iso":"GL"},--}}
{{--{"country":"Grenada","code":"1-473","iso":"GD"},--}}
{{--{"country":"Guam","code":"1-671","iso":"GU"},--}}
{{--{"country":"Guatemala","code":"502","iso":"GT"},--}}
{{--{"country":"Guernsey","code":"44-1481","iso":"GG"},--}}
{{--{"country":"Guinea","code":"224","iso":"GN"},--}}
{{--{"country":"Guinea-Bissau","code":"245","iso":"GW"},--}}
{{--{"country":"Guyana","code":"592","iso":"GY"},--}}
{{--{"country":"Haiti","code":"509","iso":"HT"},--}}
{{--{"country":"Honduras","code":"504","iso":"HN"},--}}
{{--{"country":"Hong Kong","code":"852","iso":"HK"},--}}
{{--{"country":"Hungary","code":"36","iso":"HU"},--}}
{{--{"country":"Iceland","code":"354","iso":"IS"},--}}
{{--{"country":"India","code":"91","iso":"IN"},--}}
{{--{"country":"Indonesia","code":"62","iso":"ID"},--}}
{{--{"country":"Iran","code":"98","iso":"IR"},--}}
{{--{"country":"Iraq","code":"964","iso":"IQ"},--}}
{{--{"country":"Ireland","code":"353","iso":"IE"},--}}
{{--{"country":"Isle of Man","code":"44-1624","iso":"IM"},--}}
{{--{"country":"Israel","code":"972","iso":"IL"},--}}
{{--{"country":"Italy","code":"39","iso":"IT"},--}}
{{--{"country":"Ivory Coast","code":"225","iso":"CI"},--}}
{{--{"country":"Jamaica","code":"1-876","iso":"JM"},--}}
{{--{"country":"Japan","code":"81","iso":"JP"},--}}
{{--{"country":"Jersey","code":"44-1534","iso":"JE"},--}}
{{--{"country":"Jordan","code":"962","iso":"JO"},--}}
{{--{"country":"Kazakhstan","code":"7","iso":"KZ"},--}}
{{--{"country":"Kenya","code":"254","iso":"KE"},--}}
{{--{"country":"Kiribati","code":"686","iso":"KI"},--}}
{{--{"country":"Kosovo","code":"383","iso":"XK"},--}}
{{--{"country":"Kuwait","code":"965","iso":"KW"},--}}
{{--{"country":"Kyrgyzstan","code":"996","iso":"KG"},--}}
{{--{"country":"Laos","code":"856","iso":"LA"},--}}
{{--{"country":"Latvia","code":"371","iso":"LV"},--}}
{{--{"country":"Lebanon","code":"961","iso":"LB"},--}}
{{--{"country":"Lesotho","code":"266","iso":"LS"},--}}
{{--{"country":"Liberia","code":"231","iso":"LR"},--}}
{{--{"country":"Libya","code":"218","iso":"LY"},--}}
{{--{"country":"Liechtenstein","code":"423","iso":"LI"},--}}
{{--{"country":"Lithuania","code":"370","iso":"LT"},--}}
{{--{"country":"Luxembourg","code":"352","iso":"LU"},--}}
{{--{"country":"Macao","code":"853","iso":"MO"},--}}
{{--{"country":"Macedonia","code":"389","iso":"MK"},--}}
{{--{"country":"Madagascar","code":"261","iso":"MG"},--}}
{{--{"country":"Malawi","code":"265","iso":"MW"},--}}
{{--{"country":"Malaysia","code":"60","iso":"MY"},--}}
{{--{"country":"Maldives","code":"960","iso":"MV"},--}}
{{--{"country":"Mali","code":"223","iso":"ML"},--}}
{{--{"country":"Malta","code":"356","iso":"MT"},--}}
{{--{"country":"Marshall Islands","code":"692","iso":"MH"},--}}
{{--{"country":"Mauritania","code":"222","iso":"MR"},--}}
{{--{"country":"Mauritius","code":"230","iso":"MU"},--}}
{{--{"country":"Mayotte","code":"262","iso":"YT"},--}}
{{--{"country":"Mexico","code":"52","iso":"MX"},--}}
{{--{"country":"Micronesia","code":"691","iso":"FM"},--}}
{{--{"country":"Moldova","code":"373","iso":"MD"},--}}
{{--{"country":"Monaco","code":"377","iso":"MC"},--}}
{{--{"country":"Mongolia","code":"976","iso":"MN"},--}}
{{--{"country":"Montenegro","code":"382","iso":"ME"},--}}
{{--{"country":"Montserrat","code":"1-664","iso":"MS"},--}}
{{--{"country":"Morocco","code":"212","iso":"MA"},--}}
{{--{"country":"Mozambique","code":"258","iso":"MZ"},--}}
{{--{"country":"Myanmar","code":"95","iso":"MM"},--}}
{{--{"country":"Namibia","code":"264","iso":"NA"},--}}
{{--{"country":"Nauru","code":"674","iso":"NR"},--}}
{{--{"country":"Nepal","code":"977","iso":"NP"},--}}
{{--{"country":"Netherlands","code":"31","iso":"NL"},--}}
{{--{"country":"Netherlands Antilles","code":"599","iso":"AN"},--}}
{{--{"country":"New Caledonia","code":"687","iso":"NC"},--}}
{{--{"country":"New Zealand","code":"64","iso":"NZ"},--}}
{{--{"country":"Nicaragua","code":"505","iso":"NI"},--}}
{{--{"country":"Niger","code":"227","iso":"NE"},--}}
{{--{"country":"Nigeria","code":"234","iso":"NG"},--}}
{{--{"country":"Niue","code":"683","iso":"NU"},--}}
{{--{"country":"North Korea","code":"850","iso":"KP"},--}}
{{--{"country":"Northern Mariana Islands","code":"1-670","iso":"MP"},--}}
{{--{"country":"Norway","code":"47","iso":"NO"},--}}
{{--{"country":"Oman","code":"968","iso":"OM"},--}}
{{--{"country":"Pakistan","code":"92","iso":"PK"},--}}
{{--{"country":"Palau","code":"680","iso":"PW"},--}}
{{--{"country":"Palestine","code":"970","iso":"PS"},--}}
{{--{"country":"Panama","code":"507","iso":"PA"},--}}
{{--{"country":"Papua New Guinea","code":"675","iso":"PG"},--}}
{{--{"country":"Paraguay","code":"595","iso":"PY"},--}}
{{--{"country":"Peru","code":"51","iso":"PE"},--}}
{{--{"country":"Philippines","code":"63","iso":"PH"},--}}
{{--{"country":"Pitcairn","code":"64","iso":"PN"},--}}
{{--{"country":"Poland","code":"48","iso":"PL"},--}}
{{--{"country":"Portugal","code":"351","iso":"PT"},--}}
{{--{"country":"Puerto Rico","code":"1-787, 1-939","iso":"PR"},--}}
{{--{"country":"Qatar","code":"974","iso":"QA"},--}}
{{--{"country":"Republic of the Congo","code":"242","iso":"CG"},--}}
{{--{"country":"Reunion","code":"262","iso":"RE"},--}}
{{--{"country":"Romania","code":"40","iso":"RO"},--}}
{{--{"country":"Russia","code":"7","iso":"RU"},--}}
{{--{"country":"Rwanda","code":"250","iso":"RW"},--}}
{{--{"country":"Saint Barthelemy","code":"590","iso":"BL"},--}}
{{--{"country":"Saint Helena","code":"290","iso":"SH"},--}}
{{--{"country":"Saint Kitts and Nevis","code":"1-869","iso":"KN"},--}}
{{--{"country":"Saint Lucia","code":"1-758","iso":"LC"},--}}
{{--{"country":"Saint Martin","code":"590","iso":"MF"},--}}
{{--{"country":"Saint Pierre and Miquelon","code":"508","iso":"PM"},--}}
{{--{"country":"Saint Vincent and the Grenadines","code":"1-784","iso":"VC"},--}}
{{--{"country":"Samoa","code":"685","iso":"WS"},--}}
{{--{"country":"San Marino","code":"378","iso":"SM"},--}}
{{--{"country":"Sao Tome and Principe","code":"239","iso":"ST"},--}}
{{--{"country":"Saudi Arabia","code":"966","iso":"SA"},--}}
{{--{"country":"Senegal","code":"221","iso":"SN"},--}}
{{--{"country":"Serbia","code":"381","iso":"RS"},--}}
{{--{"country":"Seychelles","code":"248","iso":"SC"},--}}
{{--{"country":"Sierra Leone","code":"232","iso":"SL"},--}}
{{--{"country":"Singapore","code":"65","iso":"SG"},--}}
{{--{"country":"Sint Maarten","code":"1-721","iso":"SX"},--}}
{{--{"country":"Slovakia","code":"421","iso":"SK"},--}}
{{--{"country":"Slovenia","code":"386","iso":"SI"},--}}
{{--{"country":"Solomon Islands","code":"677","iso":"SB"},--}}
{{--{"country":"Somalia","code":"252","iso":"SO"},--}}
{{--{"country":"South Africa","code":"27","iso":"ZA"},--}}
{{--{"country":"South Korea","code":"82","iso":"KR"},--}}
{{--{"country":"South Sudan","code":"211","iso":"SS"},--}}
{{--{"country":"Spain","code":"34","iso":"ES"},--}}
{{--{"country":"Sri Lanka","code":"94","iso":"LK"},--}}
{{--{"country":"Sudan","code":"249","iso":"SD"},--}}
{{--{"country":"Suriname","code":"597","iso":"SR"},--}}
{{--{"country":"Svalbard and Jan Mayen","code":"47","iso":"SJ"},--}}
{{--{"country":"Swaziland","code":"268","iso":"SZ"},--}}
{{--{"country":"Sweden","code":"46","iso":"SE"},--}}
{{--{"country":"Switzerland","code":"41","iso":"CH"},--}}
{{--{"country":"Syria","code":"963","iso":"SY"},--}}
{{--{"country":"Taiwan","code":"886","iso":"TW"},--}}
{{--{"country":"Tajikistan","code":"992","iso":"TJ"},--}}
{{--{"country":"Tanzania","code":"255","iso":"TZ"},--}}
{{--{"country":"Thailand","code":"66","iso":"TH"},--}}
{{--{"country":"Togo","code":"228","iso":"TG"},--}}
{{--{"country":"Tokelau","code":"690","iso":"TK"},--}}
{{--{"country":"Tonga","code":"676","iso":"TO"},--}}
{{--{"country":"Trinidad and Tobago","code":"1-868","iso":"TT"},--}}
{{--{"country":"Tunisia","code":"216","iso":"TN"},--}}
{{--{"country":"Turkey","code":"90","iso":"TR"},--}}
{{--{"country":"Turkmenistan","code":"993","iso":"TM"},--}}
{{--{"country":"Turks and Caicos Islands","code":"1-649","iso":"TC"},--}}
{{--{"country":"Tuvalu","code":"688","iso":"TV"},--}}
{{--{"country":"U.S. Virgin Islands","code":"1-340","iso":"VI"},--}}
{{--{"country":"Uganda","code":"256","iso":"UG"},--}}
{{--{"country":"Ukraine","code":"380","iso":"UA"},--}}
{{--{"country":"United Arab Emirates","code":"971","iso":"AE"},--}}
{{--{"country":"United Kingdom","code":"44","iso":"GB"},--}}
{{--{"country":"United States","code":"1","iso":"US"},--}}
{{--{"country":"Uruguay","code":"598","iso":"UY"},--}}
{{--{"country":"Uzbekistan","code":"998","iso":"UZ"},--}}
{{--{"country":"Vanuatu","code":"678","iso":"VU"},--}}
{{--{"country":"Vatican","code":"379","iso":"VA"},--}}
{{--{"country":"Venezuela","code":"58","iso":"VE"},--}}
{{--{"country":"Vietnam","code":"84","iso":"VN"},--}}
{{--{"country":"Wallis and Futuna","code":"681","iso":"WF"},--}}
{{--{"country":"Western Sahara","code":"212","iso":"EH"},--}}
{{--{"country":"Yemen","code":"967","iso":"YE"},--}}
{{--{"country":"Zambia","code":"260","iso":"ZM"},--}}
{{--{"country":"Zimbabwe","code":"263","iso":"ZW"}]--}}
{{--</script>--}}


@include('weblayouts.about')
@include('weblayouts.partner_hotels')
@include('weblayouts.partner')
@include('weblayouts.newsletter')



@endsection
