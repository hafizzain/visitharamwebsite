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
                <div id="qoute" class="flex flex-col gap-2 text-center">
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
             <button id="link2" onclick="showSection(2)" class="relative group menu-link">December Umrah Packages<span class="absolute bottom-[-5px] left-0 w-0 h-[3px] bg-[#E1C844] transition-all origin-left group-hover:w-full"></span></button>
             <button id="link3" onclick="showSection(3)" class="relative group menu-link">Ramadan Umrah Packages<span class="absolute bottom-[-5px] left-0 w-0 h-[3px] bg-[#E1C844] transition-all origin-left group-hover:w-full"></span></button>
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
        <div id="menu2" class="hidden lg:grid-cols-2 gap-10 py-10 pt-20">
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
        <div id="menu3" class="hidden lg:grid-cols-2 gap-10 py-10 pt-20">
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

<script>
 function showSection(sectionNumber){

     // Hide all sections--}}
     document.getElementById('menu1').style.display = 'none';
     document.getElementById('menu2').style.display = 'none';
     document.getElementById('menu3').style.display = 'none';
     var links = document.querySelectorAll('.menu-link');
     links.forEach(function(link) {
         link.classList.remove('activeLink');
     });
     document.getElementById('link' + sectionNumber).classList.add('activeLink');

     // Show the selected section
     document.getElementById('menu' + sectionNumber).style.display = 'grid';
 }


</script>

@include('weblayouts.about')
@include('weblayouts.partner_hotels')
@include('weblayouts.partner')

<section class="bg-white">
    <div  class="container mx-auto px-5 lg:px-10 xl:px-24 pt-2 pb-12">
        <div class="space-y-3 md:mx-auto flex justify-center">
            <!-- <p class="text-3xl font-bold text-[#110928]"> All flights and flight-inclusive holidays</p> -->
            <p class="italic max-w-[60rem] text-justify sm:text-center">
                    All the flights and flight-inclusive holidays [in this brochure] [on this website - as appropriate] are financially protected by the ATOL scheme. When you pay you will be supplied with an ATOL Certificate. Please ask for it and check to ensure that everything you booked (flights, hotels and other services) is listed on it. Please see our booking conditions for further information or for more information about financial protection and the ATOL Certificate go to: <a class="text-red-600 hover:underline" href="www.atol.org.uk/ATOLCertificate" target="_blank">www.atol.org.uk/ATOLCertificate</a> .
            </p>
        </div>

    </div>
</section>

@include('weblayouts.newsletter')



@endsection
