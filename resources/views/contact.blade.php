@extends('weblayouts.app')
@section('title')
    {{ 'Contact' }}
@endsection
@section('content')

<header class="w-full bg-[#F5F2E3]">
    <div class="container mx-auto px-5 md:px-10 xl:px-24 sm:py-0 py-10 h-[30vh] xl:h-[40vh] flex justify-center items-center">
        <h2 class="text-4xl md:text-5xl xl:text-6xl font-bold text-[#110928]">Contact Us</h2>
    </div>
</header>

<section>
    <div class="container mx-auto px-5 md:px-10 xl:px-24 py-10">
        <div class="grid lg:grid-cols-10 py-5 gap-5">
            <div class='col-span-5 lg:col-span-4 flex flex-col gap-10 p-5 lg:p-8 rounded-xl md:rounded-[20px] text-white !bg-no-repeat !bg-bottom lg:!bg-center !bg-cover lg:!bg-contain 2xl:!bg-cover' style="background: url('{{ URL('assets/img/contact/contact-bg.png') }}');">
                <div class='flex gap-5 items-start'>
                    <div>
                        <h4 class='font-semibold text-[1.7rem]'>Contact Information</h4>
                    </div>
                </div>
                <div class='flex gap-5 items-start'>
                    <img src="{{ URL('assets/img/contact/phone.svg') }}" alt="phone">
                    <p>+92 123 456 7890</p>
                </div>
                <div class='flex gap-5 items-start'>
                    <img src="{{ URL('assets/img/contact/sharp.svg') }}" alt="email">
                    <p>info@visitharam.co.uk</p>
                </div>
                <div class='flex gap-5 items-start'>
                    <img src="{{ URL('assets/img/contact/location.svg') }}" alt="location">
                    <p>4 Novella Block, Eichmannview, Massachusetts 02156 United States</p>
                </div>
            </div>
            <div class="col-span-5 lg:col-span-6 p-5 lg:p-8 w-full">
                <div class="flex flex-col gap-5 lg:gap-10">
                    <h4 class="text-[1.7rem] font-semibold">Any question or remarks? Just write us <br class="hidden lg:block"> a message!</h4>

                    <form action="{{ route('form.submit') }}" method="POST" class="flex flex-col gap-5 2xl:gap-10 pt-10">
                        @csrf
                        <div class='grid md:grid-cols-2 items-end gap-10 lg:gap-5'>
                            <div class="relative h-fit z-0 w-full group">
                                <input type="text" name="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-black peer" placeholder=" " required />
                                <label for="first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-black peer-placeholder-shown:scale-90 peer-focus:scale-75 ">First Name</label>
                            </div>
                            <div class="relative h-fit z-0 w-full group">
                                <input type="text" name="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-black peer" placeholder=" " required />
                                <label for="last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-black peer-placeholder-shown:scale-90 peer-focus:scale-75 ">Last Name</label>
                            </div>
                        </div>

                        <div class='grid md:grid-cols-2 items-end gap-10 lg:gap-5'>
                            <div class="relative h-fit z-0 w-full group">
                                <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-black peer" placeholder=" " required />
                                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-black peer-placeholder-shown:scale-90 peer-focus:scale-75 ">Email</label>
                            </div>
                            <div class="relative h-fit z-0 w-full group">
                                <input type="number" name="phone_number" id="phone_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-black peer" placeholder=" " required />
                                <label for="phone_number" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-black peer-placeholder-shown:scale-90 peer-focus:scale-75 ">Phone Number</label>
                            </div>
                        </div>
                        <input type="hidden" id="type" name="type" value="contact us">

                        <div class=" relative h-full z-0 w-full group">
                            <textarea placeholder="Write your message.." rows="7" type="text" name="message" id="message" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-black peer" placeholder=" " required></textarea>
                            <label for="message" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-black peer-placeholder-shown:scale-90 peer-focus:scale-75 peer-focus:-translate-y-6">Message</label>
                        </div>

                        <div class="flex items-end h-full justify-end">
                            <button type="submit" class="py-3 px-8 text-sm font-medium text-center text-white rounded-full bg-[#110928] sm:w-fit uppercase">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="w-full pt-5 h-[50vh] sm:h-[60vh]">
            <iframe class="border border-[#C8C8C8] rounded-xl md:rounded-[20px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6806.57831891137!2d74.42798834390716!3d31.461230946964363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391908ea43d537e3%3A0x8ae3657d8794abf7!2sAskari%20XI%2C%20Lahore%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1708515948772!5m2!1sen!2s" width="100%" height="100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>


@include('weblayouts.about')
@include('weblayouts.partner')
@include('weblayouts.newsletter')

@endsection




