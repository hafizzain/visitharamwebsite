<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <link rel="shortcut icon" href="{{ URL::asset('assets/img/logo.svg') }}">

    <title>Visit Haram</title>
</head>
<style>
    body{
        font-family: "Poppins", sans-serif;
    }
    h1{
        font-family: "Arimo", sans-serif;
    }


    .swiper-button-next:after,
    .swiper-button-prev:after{
        content: "" !important;
    }
    select {

        /* styling */
        background-color: white;
        border: thin solid blue;
        border-radius: 4px;
        display: inline-block;
        font: inherit;
        line-height: 1.5em;
        padding: 0.5em 3.5em 0.5em 1em;

        /* reset */

        margin: 0;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-appearance: none;
        -moz-appearance: none;
    }

    select.minimal {
        background-image:
            linear-gradient(45deg, transparent 50%, gray 50%),
            linear-gradient(135deg, gray 50%, transparent 50%),
            linear-gradient(to right, transparent, transparent);
        background-position:
            calc(100% - 20px) calc(1em + 2px),
            calc(100% - 15px) calc(1em + 2px),
            calc(100% - 2.5em) 0.5em;
        background-size:
            5px 5px,
            5px 5px,
            1px 1.5em;
        background-repeat: no-repeat;
    }

    select.minimal:focus {
        background-image:
            linear-gradient(45deg, green 50%, transparent 50%),
            linear-gradient(135deg, transparent 50%, green 50%),
            linear-gradient(to right, transparent, transparent);
        background-position:
            calc(100% - 15px) 1em,
            calc(100% - 20px) 1em,
            calc(100% - 2.5em) 0.5em;
        background-size:
            5px 5px,
            5px 5px,
            1px 1.5em;
        background-repeat: no-repeat;
        border-color: #E1C844;
        outline: 1px solid #E1C844;
    }
    input:focus{
        border-color: #E1C844;
        outline: 1px solid #E1C844;
    }


    select:-moz-focusring {
        color: transparent;
        text-shadow: 0 0 0 #000;
    }
    @media screen and (max-width: 1280px) {
        :root{
            font-size: 14px;
        }

        select.minimal {
            background-position:
                calc(100% - 11px) calc(1em + 2px),
                calc(100% - 7px) calc(1em + 2px),
                calc(100% - 2.5em) 0.5em;
        }
        select.minimal:focus {
            background-position:
                calc(100% - 7px) 1em,
                calc(100% - 11px) 1em,
                calc(100% - 2.5em) 0.5em;
        }
    }

    .swiper-pagination-bullet-active{
        background: black !important;
        border-radius: 5px !important;
        width: 20px !important;
    }

    @media screen and (max-width: 405px) {
        :root{
            font-size: 13px;
        }
    }

    .activeLink{
        font-weight: 700;
    }
    .activeLink > span{
        width: 100%;
    }


    /* ----- Snackbar ------ */
    .snackbar-container {
      min-width: 500px !important; /* Default width */
      max-width: 720px !important;
      font-family: "Poppins", sans-serif !important;
    }
    .snackbar-container p{
        font-weight: 700 !important;
        }

    /* Media query for mobile devices */
    @media screen and (max-width: 770px) {
        .snackbar-container {
          width: 300px !important; /* Auto width for mobile devices */
        }

        .snackbar-pos.bottom-center {
            top: auto !important;
            bottom: 1% !important;
            left: 50% !important;
            transform: translate(-50%, 0) !important;
        }
    }

    html,body{
        scroll-behavior: smooth;
    }

</style>
<body>

<div class="relative flex items-center bg-[#110928] text-white">

    <div class="container mx-auto px-5 sm:px-10 xl:px-24 py-2 flex justify-between items-center">
        <ul class="flex-1 hidden md:flex gap-x-2 md:gap-x-5 items-center flex-wrap text-xs sm:text-sm">
            <li><a href="/" class="relative group">Home<span class="absolute bottom-[-2px] left-0 w-0 h-[2px] bg-[#E1C844] transition-all origin-left group-hover:w-full"></span></a></li>

            @foreach (\App\Models\Category::all() as $category)
                <li class="relative group h-full">
                    <a href="#" class="group flex items-baseline">{{ $category->name }} <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="#E1C844" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg><span class="absolute bottom-[-2px] left-0 w-0 h-[2px] bg-[#E1C844] transition-all origin-left group-hover:w-full"></span></a>
                    <div id="{{ $category->slug }}Dropdown" class="absolute top-full left-0 z-10 hidden group-hover:block font-normal w-[17rem]">
                        <div class="bg-transparent h-4"></div>
                        <ul class="p-2 text-sm text-black bg-white font-normal rounded-lg shadow-md space-y-2 w-full">
                            @foreach ($category->packages as $package)
                                <li><a href="{{ route('packages.showDetails', ['id' => $package->id]) }}" class="block p-2 rounded-lg hover:bg-[#F3EED2]">{{ $package->name }} {{ $package->year }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach



        </ul>
        <a class="md:hidden" href="#" id="hamburger"><i class="fa-solid fa-bars text-white text-2xl"></i></a>
        <a href="/#qoute" class="rounded-full bg-[#E1C845] px-2.5 py-1 md:px-3.5 md:py-1.5 text-sm font-semibold shadow-sm flex items-center gap-1 sm:gap-2"><p class="uppercase text-[#180F34]">Beat my Quote</p> <p class="flex justify-center items-center bg-white rounded-full w-8 h-8 text-[#110928]"><i class="fa-solid fa-arrow-right"></i></p></a>
    </div>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div id="sidebar" class="hidden md:hidden">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 left-0 z-10 overflow-y-auto bg-white px-6 py-6 w-1/2 max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-end">

                <button id="closeHamburger" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <ul class="space-y-2 py-6 text-black">
                        <a href="/" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7  hover:bg-gray-50">Home</a>
                        <li class="relative group h-full"><a href="#" class="-mx-3 rounded-lg px-3 py-2 text-base font-semibold leading-7  hover:bg-gray-50 group flex items-baseline">Umrah Packages <svg class="group-hover:rotate-0 rotate-180 transition-all w-3 h-3 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6"><path stroke="#E1C844" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/></svg></a>
                            <div id="dropdownNavbar" class="z-10 hidden group-hover:block font-normal w-full">
                                <div class="bg-transparent h-2">
                                </div>
                                <ul class="text-sm text-gray-700">
                                    <li><a href="#" class="-mx-3 rounded-lg px-3 py-2 font-semibold leading-7  hover:bg-gray-50 group flex items-baseline">Umrah Packages</a></li>
                                    <li><a href="#" class="-mx-3 rounded-lg px-3 py-2 font-semibold leading-7  hover:bg-gray-50 group flex items-baseline">5 Star Umrah packages 2024</a></li>
                                    <li><a href="#" class="-mx-3 rounded-lg px-3 py-2 font-semibold leading-7  hover:bg-gray-50 group flex items-baseline">4 Star Umrah packages 2024</a></li>
                                    <li><a href="#" class="-mx-3 rounded-lg px-3 py-2 font-semibold leading-7  hover:bg-gray-50 group flex items-baseline">3 Star Umrah packages 2024</a></li>
                                </ul>
                            </div>
                        </li>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7  hover:bg-gray-50">December Umrah Packages</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7  hover:bg-gray-50">Ramadan Umrah Packages</a>
                    </ul>

                </div>
            </div>
        </div>
    </div>

</div>

<div class="bg-white">
    <nav class="container mx-auto px-5 sm:px-10 xl:px-24 py-2 flex items-center justify-between">

        <a href="/" class="">
            <img class="w-28" src=" {{ URL("assets/img/logo.svg") }}" alt="logo">
            <!-- <h1 class="text-3xl sm:text-4xl font-bold">Visit Haram</h1> -->
        </a>

        <div class="flex-1 justify-end sm:flex-none flex gap-0 sm:gap-8 items-center">
            <img class="scale-75 sm:scale-100" src="{{ URL("assets/img/partner/atol.svg") }}" alt="atol">
            <img class="scale-75 sm:scale-100" src="{{ URL("assets/img/partner/iata.svg") }}" alt="iata">
            <a href="https://wa.me/02039258000" class="text-sm font-bold flex items-center"><img class="scale-75 sm:scale-100" src="{{ URL("assets/img/whatsapp.svg") }}" alt="whatsapp">+0203 925 8000</a>
        </div>

    </nav>
    <!-- Mobile menu, show/hide based on menu open state. -->
    <div class="hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-end">

                <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7  hover:bg-gray-50">Features</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7  hover:bg-gray-50">Marketplace</a>
                        <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7  hover:bg-gray-50">Company</a>
                    </div>
                    <div class="py-6">
                        <a href="#" class="-mx-3 block rounded-lg px-2 py-1 sm:px-3 sm:py-2.5 text-sm sm:text-base font-semibold leading-7  hover:bg-gray-50">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@yield('content')

@include('weblayouts.footer')


<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/node-snackbar@latest/src/js/snackbar.min.js"></script>
<link rel="stylesheet" type="text/css"
      href="https://cdn.jsdelivr.net/npm/node-snackbar@latest/dist/snackbar.min.css" />
<script>
    let Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        //timer: 6100,
        showCloseButton: true,
        //timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    @if(session()->has('success'))
    Snackbar.show({
        pos: 'bottom-center',
        text: `{{ session()->get('success') }}`,
        textColor: "#fff",
        backgroundColor: '#110928',
        actionTextColor: '#E1C844',
        duration: '2000',
        fontFamily: 'Poppins',
    });
    @endif
</script>
<script>
    //    document.addEventListener('DOMContentLoaded', function() {
    //         Snackbar.show({
    //             pos: 'bottom-center',
    //             text:  "Success Message",
    //             textColor: "#fff",
    //             backgroundColor: '#110928',
    //             actionTextColor: '#E1C844',
    //             duration: '57000',
    //             fontFamily: 'Poppins',
    //         });
    //     });

    var swiper = new Swiper(".mySwiper", {
        // loop: true,
        // autoplay: {
        //   delay: 2500,
        //   disableOnInteraction: false,
        // },
        slidesPerView: 1,
        spaceBetween: 10,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            770: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
        },
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
        navigation: {
            prevEl: '.swiper-button-prev',
            nextEl: '.swiper-button-next',
        },

    });

    var headerSwiper = new Swiper(".headerSwiper", {
      // loop: true,
      // autoplay: {
      //   delay: 2500,
      //   disableOnInteraction: false,
      // },
      slidesPerView: 1,
      spaceBetween: 10,
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
      },

  });

    var customerSwiper = new Swiper(".customerSwiper", {
    // loop: true,
    // autoplay: {
    //   delay: 2500,
    //   disableOnInteraction: false,
    // },
    slidesPerView: 1,
      spaceBetween: 10,
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        770: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
      },
    pagination: {
    el: ".swiper-pagination1",
    dynamicBullets: true,
    },
  });
    var swiper = new Swiper(".umrahPackageSwiper1", {
    // loop: true,
    // autoplay: {
    //   delay: 2500,
    //   disableOnInteraction: false,
    // },
    slidesPerView: 1,
      spaceBetween: 10,

    pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
    },
  });
    var swiper = new Swiper(".umrahPackageSwiper2", {
    // loop: true,
    // autoplay: {
    //   delay: 2500,
    //   disableOnInteraction: false,
    // },
    slidesPerView: 1,
      spaceBetween: 10,

    pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
    },
  });


    // SideBar

    let hamburger = document.querySelector("#hamburger");
    let closeHamburger = document.querySelector("#closeHamburger");
    let sidebar = document.querySelector("#sidebar");

    hamburger.addEventListener("click", ()=> {
        sidebar.classList.toggle("hidden")
    })
    closeHamburger.addEventListener("click", ()=> {
        sidebar.classList.toggle("hidden")
    })
</script>
</body>
</html>

