@extends('weblayouts.app')
@section('title')
    {{ 'Home' }}
@endsection
@section('content')

<header class="w-full" style="background: url('{{ asset('assets/img/header/header.png') }}')
 no-repeat center/cover;">
    <div class="flex justify-center items-center py-24 xl:pt-10 xl:pb-28 2xl:pb-32">
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
                    <img class="object-cover" src="{{ URL("assets/img/partner/partner.png") }}" alt="partner">
                    <hr class="bg-black border-black">
                    <a href="#" class="text-xl font-semibold">+92 123 456 7890</a>
                </div>
            </div>
        </div>

    </div>
</header>

<section>
    <div class="container mx-auto px-5 lg:px-10 xl:px-24 py-2">

        <div class="-translate-y-20 shadow-[0px_4px_50px_0px_#00000033] rounded-xl xl:rounded-[20px] xl:h-[250px]">
            <div class="xl:h-[60px] py-3 xl:py-0 bg-[#E1C844] rounded-t-xl xl:rounded-t-[20px] px-5 lg:px-8 flex items-center">
                <p class="text-2xl font-semibold">Get Custom Quote</p>
            </div>
            <div class="xl:h-[190px] bg-white rounded-b-xl xl:rounded-b-[20px] px-5 lg:px-8 py-6 flex flex-col justify-between">
                <div class="flex sm:flex-nowrap flex-wrap items-center gap-3 md:gap-5">
                    <div class="mb-5 w-full">
                        <label for="name" class="block mb-1 text-sm font-medium text-[#808080] ">Your Name</label>
                        <input type="text" id="name" class=" bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5" placeholder="Enter Your Name" required />
                    </div>
                    <div class="mb-5 w-full">
                        <label for="email" class="block mb-1 text-sm font-medium text-[#808080] ">Your Email</label>
                        <input type="email" id="email" class=" bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5" placeholder="Enter Email Address" required />
                    </div>
                    <div class="mb-5 w-full relative">
                        <label for="mobile" class="block mb-1 text-sm font-medium text-[#808080] ">Mobile Number</label>
                        <!-- <input type="number" id="mobile" class=" bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5" placeholder="Enter Phone Number" required /> -->
                        <form class="w-full">
                            <div class="flex items-center">
                                <select class="minimal w-[100px] h-[36.6px] xl:h-[41.6px] bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-l-lg rounded-r-none focus:ring-[#E1C844] focus:border-[#E1C844] block p-2.5">
                                    <option value="+1">+1</option>
                                    <option value="+2">+2</option>
                                    <option value="+3">+3</option>
                                </select>
                                <div class="relative w-full">
                                    <input type="text" id="phone-input" class="h-[36.6px] xl:h-[41.6px] bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-tr-lg rounded-br-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required />
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="mb-5 w-full">
                        <label for="adults" class="block mb-1 text-sm font-medium text-[#808080] ">Adults</label>
                        <select id="adults" class="minimal bg-gray-50 border border-gray-300 text-black placeholder:text-black text-sm rounded-lg focus:ring-[#E1C844] focus:border-[#E1C844] block w-full p-2.5">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-5 sm:gap-0 sm:flex-nowrap flex-wrap items-center justify-between">
                    <div class="flex items-center">
                        <input id="default-checkbox" type="checkbox" value="" class="sm:w-4 sm:h-4 h-6 w-6  bg-[#D3DCDC] border-[#D3DCDC] rounded focus:ring-blue-500 ">
                        <label for="default-checkbox" class="ms-2 text-sm font-normal text-black">I want deals via phone calls and promotions through emails.</label>
                    </div>
                    <button class="uppercase text-white bg-[#110928] rounded-full px-6 md:px-10 py-2">Submit Enquiry</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-5 sm:px-10 xl:px-24 py-2">
        <h2 class="text-[#110928] font-bold text-3xl text-center">Trusted Hajj and Umrah Travel Agency in the UK</h2>
        <div class="md:px-5 xl:px-20 grid grid-cols-2 place-items-center md:flex items-center justify-between flex-wrap md:flex-nowrap md:gap-5 xl:gap-10 py-16">
            <img class="xl:scale-100 scale-75" src="{{ URL("assets/img/trusted/trust1.png") }}" alt="trust1">
            <img class="xl:scale-100 scale-75" src="{{ URL("assets/img/trusted/trust2.png") }}" alt="trust2">
            <img class="xl:scale-100 scale-75" src="{{ URL("assets/img/trusted/trust3.png") }}" alt="trust3">
            <img class="xl:scale-100 scale-75" src="{{ URL("assets/img/trusted/trust4.png") }}" alt="trust4">
        </div>
    </div>
</section>

<section class="" style="background: url('{{ asset('assets/img/package/img1.png') }}');"
>
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
                <div class="swiper-slide text-[#110928] flex flex-col gap-5 items-center bg-white border border-[#C8C8C8] rounded-[20px] p-4 lg:p-7">
                    <div class="py-4 px-4 md:px-8 font-semibold text-2xl space-x-2" style="background: url('{{ asset('assets/img/header/bg.png') }}') no-repeat center/contain;">
                        <span>${{$package->price}}</span><span class="text-sm">{{$package->nights}} Nights</span>
                    </div>
                    <h4 class="text-2xl md:text-3xl font-semibold text-center">{{$package->name}}</h4>
                    <div class="flex items-center border-b border-[#D9D9D9]">
                        @php $counter = 0; @endphp
                        @foreach ($package->service as $service)
                            @if ($counter < 2)
                        <div class="flex flex-col items-center gap-2 p-4 md:p-6 first:border-r border-[#D9D9D9]">
                            <img class="rounded-full" src="{{ URL($service->image) }}" alt="card1">
                            <div class="text-center">
                                <h6 class="font-medium md:text-xl">{{$service->name}}</h6>
{{--                                <p class="text-sm">Conrad Makkah</p>--}}
                            </div>
                        </div>
                                @php $counter++; @endphp
                            @else
                                @break
                            @endif
                        @endforeach

                    </div>
                    <div class="flex justify-between items-center w-full">
                        <a href="{{ route('packages.showDetails', ['id' => $package->id]) }}" class="space-x-2 font-semibold text-sm md:text-base"><i class="fa-solid fa-phone text-[#E1C844]"></i> +92 123 456 7890</a>
                        <a href="{{ route('packages.showDetails', ['id' => $package->id]) }}" class="bg-[#110928] px-6 md:px-8 py-2 text-white rounded-full">View Details</a>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>



@include('weblayouts.about')
@include('weblayouts.partner')
@include('weblayouts.newsletter')



@endsection
