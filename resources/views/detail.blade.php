@extends('weblayouts.app')
@section('title')
    {{ 'Detail' }}
@endsection
@section('content')


<header class="w-full bg-[#F5F2E3]">
    <div class="container mx-auto px-5 md:px-10 xl:px-24 md:py-0 py-10 md:h-[30vh] xl:h-[40vh] grid md:grid-cols-8 gap-5 md:gap-8 md:translate-y-[33%]">
        <div class="md:col-span-4 lg:col-span-3 swiper headerSwiper pb-10">
            <div class="swiper-wrapper">
                @foreach ($package->media as $media)
                <img class="swiper-slide h-[300px] md:h-full rounded-[20px] object-cover" src="{{ URL($media->file) }}" alt="img1">
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="md:col-span-4 lg:col-span-5 w-full md:pb-10">
            <div class="h-full w-full rounded-[20px] bg-white border border-[#D7D7D7] text-[#110928] p-5 lg:p-8 flex flex-col justify-between gap-2">
                <h5 class="text-2xl lg:text-3xl font-semibold">{{$package->name}}</h5>
                <p class="text-2xl lg:text-3xl">Price: <span class="text-[#09B175] font-semibold">£{{$package->price}}</span></p>
                <div class="grid grid-cols-2 gap-5 py-2 text-sm lg:text-base">
                    @php $counter = 0; @endphp
                    @foreach ($package->service as $service)
                    @if ($counter < 2)
                    <div class="flex flex-col sm:flex-row flex-wrap lg:flex-nowrap justify-center gap-2 items-center">
                        <img class="rounded-full w-20 h-20 lg:h-24 lg:w-24" src="{{ URL($service->image) }}" alt="img">
                        <div class="flex flex-col gap-1">
                            <p class="text-base font-bold lg:w-20">{{$service->name}}</p>
                            <p class="text-sm">{{$service->name}}</p>
                        </div>
                    </div>
                    @php $counter++; @endphp
                        @else
                            @break
                        @endif
                    @endforeach

                </div>
                <hr class="w-full border-[#CCCCCC]">
                <div class="flex flex-wrap md:flex-nowrap items-center justify-between gap-5 lg:gap-10 py-2 text-sm">
                    <div class="flex flex-col items-center gap-2">
                        <img src="{{ URL($facility->image) }}" alt="visa">
                        <p>{{ $facility->name }}</p>
                    </div>
                    @endforeach
                </div>
                <hr class="w-full border-[#CCCCCC]">
                <div class="flex items-center gap-5 sm:gap-2 md:gap-5 text-sm lg:text-base pt-4">
                    <button class="rounded-full w-full border-2 border-black py-2.5 font-semibold"><i class="fa-solid fa-phone text-[#E1C844]"></i> +92 123 456 7890</button>
                    <button class="rounded-full w-full border-2 border-[#09B175] bg-[#09B175] text-white py-2.5 font-semibold">Book Now</button>
                </div>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-2 md:pt-80 xl:pt-72">
        <div class="shadow-[0px_4px_50px_0px_#00000033] rounded-xl xl:rounded-[20px] xl:h-[250px]">
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
    <div class="container mx-auto px-5 sm:px-10 xl:px-24 py-2 pt-16">
        <h2 class="text-[#110928] font-bold text-3xl text-center">Trusted Hajj and Umrah Travel Agency in the UK</h2>
        <div class="md:px-5 xl:px-20 grid grid-cols-2 place-items-center md:flex items-center justify-between flex-wrap md:flex-nowrap md:gap-5 xl:gap-10 py-16">
            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust1.png') }}" alt="trust1">
            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust2.png') }}" alt="trust2">
            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust3.png') }}" alt="trust3">
            <img class="xl:scale-100 scale-75" src="{{ URL('assets/img/trusted/trust4.png') }}" alt="trust4">
        </div>
    </div>
</section>

<section>
    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-24 pt-10 md:pt-0">
        
        <div class="flex flex-col gap-10">
            <div class="bg-[#F3EED2] rounded-xl lg:rounded-[20px] px-10 py-5 pt-16">
                <h2 class="text-[#110928] font-bold text-3xl text-center pb-5 lg:pb-0">7 Nights 5 Star Umrah Package</h2>
                <div class="py-5 space-y-5 md:space-y-10">
                    <div class="bg-white grid gap-5 md:gap-0 md:grid-cols-2 rounded-xl lg:rounded-[20px] p-5 lg:p-8">
                        <ul class="space-y-5 border-b md:border-b-0 pb-5 md:pb-0 md:border-r border-[#D3D2C9]">
                            <li class='flex items-center gap-2'><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                                </svg> <span class='text-base'>Visa</span>
                            </li>
                            <li class='flex items-center gap-2'><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                                </svg> <span class='text-base'>Ground Transfers Can be Included on Extra Cost</span>
                            </li>
                            <li class='flex items-center gap-2'><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                                </svg> <span class='text-base'>All Packages are Based on 3-4 People Sharing</span>
                            </li>
                            <li class='flex items-center gap-2'><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                                </svg> <span class='text-base'>Return Flights</span>
                            </li>
                            <li class='flex items-center gap-2'><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                                </svg> <span class='text-base'>Direct Flights Can be Arranged on Special Request</span>
                            </li>
                        </ul>
                        <ul class="space-y-5 flex flex-col justify-between md:pl-5 lg:pl-8">
                            <li class='flex items-start gap-5'>
                                <img class="size-8 md:scale-125" src="{{ URL('assets/img/details/wifi.svg') }}" alt="wifi">
                                <div>
                                    <h6 class='text-base font-bold mb-2'>Free Wi-Fi</h6>
                                    <p class='text-base'>Enjoy full access to free Wi-Fi right in your room and connect with your loved ones.</p>
                                </div>
                            </li>
                            
                            <li class='flex items-start gap-5'>
                                <img class="size-8 md:scale-125" src="{{ URL('assets/img/details/ac.svg') }}" alt="ac">
                                <div>
                                    <h6 class='text-base font-bold mb-2'>A/C Rooms</h6>
                                    <p class='text-base'>All the rooms, no matter single or quad shared, have air-conditioning installed.</p>
                                </div>
                            </li>
                        
                        </ul>
                    </div>
                    <div class="grid gap-5 md:gap-0 md:grid-cols-2">
                        <div class="swiper umrahPackageSwiper1 pb-10">
                            <div class="swiper-wrapper">
                                <img class="swiper-slide h-[280px] md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover" src="{{ URL('assets/img/details/makkah1.png') }}" alt="img1">
                                <img class="swiper-slide h-[280px] md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover" src="{{ URL('assets/img/details/makkah1.png') }}" alt="img1">
                                <img class="swiper-slide h-[280px] md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover" src="{{ URL('assets/img/details/makkah1.png') }}" alt="img1">
                                <img class="swiper-slide h-[280px] md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover" src="{{ URL('assets/img/details/makkah1.png') }}" alt="img1">
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="md:p-5 lg:p-8">
                            <h5 class="text-2xl font-bold">Conrad Makkah</h5>
                            <div class="space-y-7 py-2 lg:w-3/4">
                                <p>The 5-star Elaf Kinda Hotel is adjacent to King Abdul Aziz's stop facing the Holy Mosque between King Abdul Aziz Gat</p>
                                <p>Rooms at Elaf Kinda Hotel feature dark wood furnishings, printed carpeted floors and a tea / coffee maker. All suites have a seating area with a sofa, as well as speakers connected directly to the Haram.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-[#F3EED2] rounded-xl lg:rounded-[20px] px-10 py-5 pt-16">
                <h2 class="text-[#110928] font-bold text-3xl text-center pb-5 lg:pb-0">7 Nights 5 Star Umrah Package</h2>
                <div class="py-5 space-y-5 md:space-y-10">
                    <div class="bg-white grid gap-5 md:gap-0 md:grid-cols-2 rounded-xl lg:rounded-[20px] p-5 lg:p-8">
                        <ul class="space-y-5 border-b md:border-b-0 pb-5 md:pb-0 md:border-r border-[#D3D2C9]">
                            <li class='flex items-center gap-2'><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                                </svg> <span class='text-base'>Visa</span>
                            </li>
                            <li class='flex items-center gap-2'><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                                </svg> <span class='text-base'>Ground Transfers Can be Included on Extra Cost</span>
                            </li>
                            <li class='flex items-center gap-2'><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                                </svg> <span class='text-base'>All Packages are Based on 3-4 People Sharing</span>
                            </li>
                            <li class='flex items-center gap-2'><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                                </svg> <span class='text-base'>Return Flights</span>
                            </li>
                            <li class='flex items-center gap-2'><svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.80577 13.4429C3.20333 11.2441 1.61781 9.06862 0 6.84938C0.338932 6.53516 0.684781 6.19542 1.05907 5.88703C1.12516 5.83308 1.34036 5.87172 1.43873 5.93515C2.42248 6.57161 3.39547 7.22193 4.3723 7.86714C4.48605 7.94223 4.60364 8.01222 4.74121 8.09752C4.97331 7.82558 5.18851 7.57114 5.40601 7.31889C7.42039 4.97572 9.63459 2.82793 12.2116 1.02936C12.6765 0.704931 13.1423 0.511003 13.7294 0.566411C14.1168 0.602864 14.5111 0.572973 14.9999 0.572973C10.7582 4.35457 7.7378 8.88198 4.80577 13.4429Z" fill="#09B175"/>
                                </svg> <span class='text-base'>Direct Flights Can be Arranged on Special Request</span>
                            </li>
                        </ul>
                        <ul class="space-y-5 flex flex-col justify-between md:pl-5 lg:pl-8">
                            <li class='flex items-start gap-5'>
                                <img class="size-8 md:scale-125" src="{{ URL('assets/img/details/wifi.svg') }}" alt="wifi">
                                <div>
                                    <h6 class='text-base font-bold mb-2'>Free Wi-Fi</h6>
                                    <p class='text-base'>Enjoy full access to free Wi-Fi right in your room and connect with your loved ones.</p>
                                </div>
                            </li>
                            
                            <li class='flex items-start gap-5'>
                                <img class="size-8 md:scale-125" src="{{ URL('assets/img/details/ac.svg') }}" alt="ac">
                                <div>
                                    <h6 class='text-base font-bold mb-2'>A/C Rooms</h6>
                                    <p class='text-base'>All the rooms, no matter single or quad shared, have air-conditioning installed.</p>
                                </div>
                            </li>
                        
                        </ul>
                    </div>
                    <div class="grid gap-5 md:gap-0 md:grid-cols-2">
                        <div class="swiper umrahPackageSwiper2 pb-10">
                            <div class="swiper-wrapper">
                                <img class="swiper-slide h-[280px] md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover" src="{{ URL('assets/img/details/madina1.png') }}" alt="img1">
                                <img class="swiper-slide h-[280px] md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover" src="{{ URL('assets/img/details/madina1.png') }}" alt="img1">
                                <img class="swiper-slide h-[280px] md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover" src="{{ URL('assets/img/details/madina1.png') }}" alt="img1">
                                <img class="swiper-slide h-[280px] md:h-[320px] lg:h-[350px] rounded-xl lg:rounded-[20px] object-cover" src="{{ URL('assets/img/details/madina1.png') }}" alt="img1">
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="md:p-5 lg:p-8">
                            <h5 class="text-2xl font-bold">El Eifman Hotel</h5>
                            <div class="space-y-7 py-2 lg:w-3/4">
                                <p>The 5-star Elaf Kinda Hotel is adjacent to King Abdul Aziz's stop facing the Holy Mosque between King Abdul Aziz Gat</p>
                                <p>Rooms at Elaf Kinda Hotel feature dark wood furnishings, printed carpeted floors and a tea / coffee maker. All suites have a seating area with a sofa, as well as speakers connected directly to the Haram.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-10 grid lg:grid-cols-2 gap-10">
            <div class="text-white py-5 sm:py-8 px-5 md:px-10 rounded-xl md:rounded-[20px] flex flex-col sm:flex-row items-center justify-between gap-10 !bg-contain" style="background: linear-gradient(rgba(24, 192, 132,0.7),rgba(24, 192, 132,0.4)), url('{{ URL('assets/img/details/qoute_bg.png') }}');">
                <div class="h-full flex flex-col items-center sm:items-start sm:text-left text-center justify-between gap-3">
                    <div class="space-y-3">
                        <p class="text-xl">Up to 15%</p>
                        <h6 class="font-bold text-2xl">Better Rates Than Market</h6>
                    </div>
                    <button class="w-fit px-8 py-3 bg-[#110928] rounded-full">Get Quote</button>
                </div>
                <div>
                    <img class="md:scale-125" src="{{ URL('assets/img/details/qoute.png') }}" alt="qoute">
                </div>
            </div>
            <div class="text-[#110928] py-5 md:py-8 px-5 md:px-10 rounded-xl md:rounded-[20px] flex flex-col sm:flex-row items-center justify-between gap-10 !bg-contain" style="background: linear-gradient(rgba(225, 200, 68, .6),rgba(225, 200, 68, .4)), url('{{ URL('assets/img/details/call_bg.png') }}');">
                <div class="h-full flex flex-col items-center sm:items-start sm:text-left text-center justify-between gap-3">
                    <div class="space-y-3">
                        <p class="text-xl">Got Stuck While <br class="md:block hidden">
                            Devising Your Package?</p>
                        <h6 class="font-bold text-2xl">Get Experts Assistance</h6>
                    </div>
                    <button class="text-white w-fit px-8 py-3 bg-[#110928] rounded-full">Call us now</button>
                </div>
                <div>
                    <img class="md:scale-125" src="{{ URL('assets/img/details/call.png') }}" alt="qoute">
                </div>
            </div>
        </div>

    </div>
</section>

<section class="bg-[#F3F3F3]">
    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-24">

        <div class="text-center text-[#110928]">
            <div class="text-3xl font-bold">
                What Customers Say About Us!
            </div>
        </div>

        <div class="">
            <div class="swiper customerSwiper py-10">
                <div class="swiper-wrapper">

                    <div class="swiper-slide bg-white border border-[#E3E3E3] rounded-[20px] p-5 md:p-8 flex flex-col gap-7">
                        <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        <div class="flex gap-5 items-center">
                            <img class="rounded-full h-20 w-20" src="{{ URL("assets/img/details/user1.png") }}" alt="user">
                            <div>
                                <h6 class="text-[#09B175] text-lg">LORAINE HUCHLER</h6>
                                <p class="text-sm text-[#808080]">PRESIDENT, MARTECH SYSTEMS, INC</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white border border-[#E3E3E3] rounded-[20px] p-5 md:p-8 flex flex-col gap-7">
                        <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        <div class="flex gap-5 items-center">
                            <img class="rounded-full h-20 w-20" src="{{ URL("assets/img/details/user1.png") }}" alt="user">
                            <div>
                                <h6 class="text-[#09B175] text-lg">LORAINE HUCHLER</h6>
                                <p class="text-sm text-[#808080]">PRESIDENT, MARTECH SYSTEMS, INC</p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide bg-white border border-[#E3E3E3] rounded-[20px] p-5 md:p-8 flex flex-col gap-7">
                        <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        <div class="flex gap-5 items-center">
                            <img class="rounded-full h-20 w-20" src="{{ URL("assets/img/details/user1.png") }}" alt="user">
                            <div>
                                <h6 class="text-[#09B175] text-lg">LORAINE HUCHLER</h6>
                                <p class="text-sm text-[#808080]">PRESIDENT, MARTECH SYSTEMS, INC</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination swiper-pagination1"></div>
            </div>
        </div>

    </div>
</section>

<section class="bg-white">
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
                            <span>${{$package->price}}</span><span class="text-sm font-normal">{{$package->nights}} Nights</span>
                        </div>
                        <h4 class="text-2xl md:text-3xl font-semibold text-center">{{$package->name}}</h4>
                        <div class="flex items-center border-b border-[#D9D9D9]">
                            @foreach ($package->service as $service)
                                <div class="flex flex-col items-center gap-2 p-4 md:p-6">
                                    <img class="rounded-full" src="{{ URL($service->image) }}" alt="card1">
                                    <div class="text-center">
                                        <h6 class="font-medium md:text-xl">{{$service->name}}</h6>
{{--                                        <p class="text-sm">Conrad Makkah</p>--}}
                                    </div>
                                </div>
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


    @include('weblayouts.partner_hotels')
    @include('weblayouts.partner')
    @include('weblayouts.newsletter')

@endsection
