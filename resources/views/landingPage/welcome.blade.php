@extends('template.main-template')

@section('content')
<div>
  <!-- Hero Section -->
  <section class="mb-20">
    <div class="container mx-auto px-4 relative">
      <div class="max-w-xl mx-auto mb-12 text-center">
        <h1 class="mt-10 font-heading text-6xl tracking-tight mb-5 font-semibold text-brown-800">
          E-COMMERCE KERAJINAN LOKAL INDONESIA
        </h1>
      </div>

      <div>
        <div class="flex justify-center gap-4">
          <a href="{{ route('login') }}"
             class="inline-flex py-4 px-6 items-center justify-center text-lg font-medium text-brown-800 border border-brown-700 hover:bg-brown-700 hover:text-brown-600 rounded-full transition duration-200">
             Login
          </a>
          <a href="{{ route('register') }}"
             class="inline-flex py-4 px-6 items-center justify-center text-lg font-medium text-brown-800 border border-brown-700 hover:bg-brown-700 hover:text-brown-600 rounded-full transition duration-200">
             Register
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="py-24 bg-brown-800">
    <div class="container mx-auto px-4">
      <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Card 1 -->
        <div class="py-10 px-8 bg-white rounded-2xl shadow-md text-center">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
               xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6">
            <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z"
                  fill="#BEF264"></path>
            <rect x="23" y="8" width="2" height="12" rx="1" fill="#3F220F"></rect>
            <rect x="23" y="28" width="2" height="12" rx="1" fill="#3F220F"></rect>
          </svg>
          <h5 class="text-4xl font-semibold text-brown-800 mb-3">5,000 MWh</h5>
          <span class="block mb-4 text-lg font-medium">Renewable Energy Generated</span>
          <p class="text-gray-700">We proudly announce the generation of 5,000 megawatt-hours of renewable energy, contributing to a greener and more sustainable future.</p>
        </div>

        <!-- Card 2 -->
        <div class="py-10 px-8 bg-white rounded-2xl shadow-md text-center">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
               xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6">
            <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z"
                  fill="#BEF264"></path>
            <path d="M24 10.6667C20.6863 10.6667 18 13.353 18 16.6667C18 19.9805 20.6863 22.6667 24 22.6667C27.3137 22.6667 30 19.9805 30 16.6667C30 13.353 27.3137 10.6667 24 10.6667Z"
                  fill="#3F220F"></path>
          </svg>
          <h5 class="text-4xl font-semibold text-brown-800 mb-3">10,000+</h5>
          <span class="block mb-4 text-lg font-medium">Customers Served</span>
          <p class="text-gray-700">We celebrate the trust of over 10,000 satisfied customers who inspire us to deliver outstanding service every day.</p>
        </div>

        <!-- Card 3 -->
        <div class="py-10 px-8 bg-white rounded-2xl shadow-md text-center">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
               xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-6">
            <path d="M0 8C0 3.58172 3.58172 0 8 0H40C44.4183 0 48 3.58172 48 8V40C48 44.4183 44.4183 48 40 48H8C3.58172 48 0 44.4183 0 40V8Z"
                  fill="#BEF264"></path>
            <path d="M13.3333 12C12.597 12 12 12.597 12 13.3333V14.6667C12 20.5577 16.7756 25.3333 22.6667 25.3333V34.6667C22.6667 35.403 23.2636 36 24 36C24.7364 36 25.3333 35.403 25.3333 34.6667V29.3333C31.2244 29.3333 36 24.5577 36 18.6667V17.3333C36 16.597 35.403 16 34.6667 16H33.3333C29.961 16 26.9541 17.565 24.9994 20.0084C23.8183 15.4035 19.6399 12 14.6667 12H13.3333Z"
                  fill="#3F220F"></path>
          </svg>
          <h5 class="text-4xl font-semibold text-brown-800 mb-3">15%</h5>
          <span class="block mb-4 text-lg font-medium">Avg. Energy Saved</span>
          <p class="text-gray-700">We proudly report an average of 15% energy savings as part of our continuous efforts to promote sustainability.</p>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
