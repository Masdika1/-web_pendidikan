<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Swiper.js JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>

  </head>
  <body>
    <!-- component -->
    <div class="min-h-screen bg-gray-50/50">
      <aside
        class="bg-gradient-to-br from-gray-800 to-gray-900 -translate-x-80 fixed inset-0 z-50 my-4 ml-4 h-[calc(100vh-32px)] w-72 rounded-xl transition-transform duration-300 xl:translate-x-0"
      >
        <div class="relative border-b border-white/20">
          <a class="flex items-center gap-4 py-6 px-8" href="#/">
            <h6
              class="block antialiased tracking-normal font-sans text-base font-semibold leading-relaxed text-white"
            >
              Skillify
            </h6>
          </a>
          <button
            class="middle none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-8 max-w-[32px] h-8 max-h-[32px] rounded-lg text-xs text-white hover:bg-white/10 active:bg-white/30 absolute right-0 top-0 grid rounded-br-none rounded-tl-none xl:hidden"
            type="button"
          >
            <span
              class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2.5"
                stroke="currentColor"
                aria-hidden="true"
                class="h-5 w-5 text-white"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12"
                ></path>
              </svg>
            </span>
          </button>
        </div>
        <div class="m-4">
          <ul class="mb-4 flex flex-col gap-1">
            <li>
              <a aria-current="page" class="" href="{{route ('student.dashboard')}}">
                <button
                  class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg {{ Route::currentRouteName() == 'student.dashboard' ? 'bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85]' : 'text-white hover:bg-white/10 active:bg-white/30' }} w-full flex items-center gap-4 px-4 capitalize"
                  type="button"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                    class="w-5 h-5 text-inherit"
                  >
                    <path
                      d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"
                    ></path>
                    <path
                      d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"
                    ></path>
                  </svg>
                  <p
                    class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize"
                  >
                    Dashboard
                  </p>
                </button>
              </a>
            </li>
            <li>
              <a class="" href="/profile">
                <button
                  class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg {{ Route::currentRouteName() == 'profile.show' ? 'bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85]' : 'text-white hover:bg-white/10 active:bg-white/30' }} w-full flex items-center gap-4 px-4 capitalize"
                  type="button"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                    class="w-5 h-5 text-inherit"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                  <p
                    class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize"
                  >
                    Profile
                  </p>
                </button>
              </a>
            </li>
            <li>
              <a class="" href="{{route('student.kursuses.index')}}">
                <button
                  class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg {{ Route::currentRouteName() == 'student.kursuses.index' ? 'bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85]' : 'text-white hover:bg-white/10 active:bg-white/30' }} w-full flex items-center gap-4 px-4 capitalize"
                  type="button"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                    class="w-5 h-5 text-inherit"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                  <p
                    class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize"
                  >
                    Beli Kursus
                  </p>
                </button>
              </a>
            </li>
            <li>
              <a class="" href="{{route('student.kursusku.index')}}">
                <button
                  class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg {{ Route::currentRouteName() == 'student.kursusku.index' ? 'bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85]' : 'text-white hover:bg-white/10 active:bg-white/30' }} w-full flex items-center gap-4 px-4 capitalize"
                  type="button"
                >
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                    class="w-5 h-5 text-inherit"
                >
                    <path
                    fill-rule="evenodd"
                    d="M6.75 4.5a.75.75 0 00-.75.75v13.5a.75.75 0 001.5 0v-13.5a.75.75 0 00-.75-.75zm10.5 0a.75.75 0 00-.75.75v13.5a.75.75 0 001.5 0v-13.5a.75.75 0 00-.75-.75zM3 6.75A2.25 2.25 0 015.25 4.5h13.5A2.25 2.25 0 0121 6.75v10.5A2.25 2.25 0 0118.75 19.5H5.25A2.25 2.25 0 013 17.25V6.75zm16.5 0a.75.75 0 00-.75-.75H5.25a.75.75 0 00-.75.75v10.5c0 .414.336.75.75.75h13.5c.414 0 .75-.336.75-.75V6.75z"
                    clip-rule="evenodd"
                    />
                </svg>
                  <p
                    class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize"
                  >
                    Kursus Saya
                  </p>
                </button>
              </a>
            </li>
            <li>
                <a class="" href="{{route('student.sertifikat.index')}}">
                  <button
                    class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg {{ Route::currentRouteName() == 'student.sertifikat.index' ? 'bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85]' : 'text-white hover:bg-white/10 active:bg-white/30' }} w-full flex items-center gap-4 px-4 capitalize"
                    type="button"
                  >
                  <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                  aria-hidden="true"
                  class="w-5 h-5 text-inherit"
                >
                  <path
                    fill-rule="evenodd"
                    d="M12 2a6.375 6.375 0 016.375 6.375v4.95a6.375 6.375 0 01-3.618 5.827l-.756.35-.021 1.498a.75.75 0 01-.67.745l-3 .375a.75.75 0 01-.83-.645l-.165-1.973a6.381 6.381 0 01-2.295-.798l-.755.35a6.375 6.375 0 01-3.617-5.828v-4.95A6.375 6.375 0 0112 2zm0 1.5a4.875 4.875 0 00-4.875 4.875v4.95a4.875 4.875 0 002.73 4.444l.953-.44a.75.75 0 01.63 0l.953.44a4.875 4.875 0 002.73-4.444v-4.95A4.875 4.875 0 0012 3.5zm-.625 9.25h1.25a.625.625 0 000-1.25h-1.25a.625.625 0 000 1.25z"
                    clip-rule="evenodd"
                  />
                </svg>
                    <p
                      class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize"
                    >
                      Sertifikat
                    </p>
                  </button>
                </a>
              </li>
              <li>
                <a class="" href="{{route('reviews.index')}}">
                  <button
                    class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg {{ Route::currentRouteName() == 'reviews.index' ? 'bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85]' : 'text-white hover:bg-white/10 active:bg-white/30' }} w-full flex items-center gap-4 px-4 capitalize"
                    type="button"
                  >
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    aria-hidden="true"
                    class="w-5 h-5 text-inherit"
                    >
                    <path
                        fill-rule="evenodd"
                        d="M12 2.25a.75.75 0 01.668.418l2.193 4.438 4.893.711a.75.75 0 01.415 1.279l-3.541 3.45.835 4.87a.75.75 0 01-1.087.79L12 16.9l-4.376 2.3a.75.75 0 01-1.087-.79l.835-4.87-3.541-3.45a.75.75 0 01.415-1.279l4.893-.711 2.193-4.438A.75.75 0 0112 2.25zm0 3.278L10.317 8.92a.75.75 0 01-.564.409l-3.465.504 2.507 2.443a.75.75 0 01.216.664l-.592 3.456 3.104-1.63a.75.75 0 01.698 0l3.104 1.63-.592-3.456a.75.75 0 01.216-.664l2.507-2.443-3.465-.504a.75.75 0 01-.564-.41L12 5.528z"
                        clip-rule="evenodd"
                    />
                    </svg>
                    <p
                      class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize"
                    >
                      Review
                    </p>
                  </button>
                </a>
              </li>
              <li>
                <a class="" href="{{route('student.payments.studentPayments')}}">
                  <button
                    class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg {{ Route::currentRouteName() == 'student.payments.studentPayments' ? 'bg-gradient-to-tr from-blue-600 to-blue-400 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 active:opacity-[0.85]' : 'text-white hover:bg-white/10 active:bg-white/30' }} w-full flex items-center gap-4 px-4 capitalize"
                    type="button"
                  >
                  <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                  aria-hidden="true"
                  class="w-6 h-6 text-white"
                >
                  <path
                    d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                  ></path>
                  <path
                    fill-rule="evenodd"
                    d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
                    clip-rule="evenodd"
                  ></path>
                  <path
                    d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z"
                  ></path>
                </svg>
                    <p
                      class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize"
                    >
                      Pembayaran
                    </p>
                  </button>
                </a>
              </li>
          </ul>
          <ul class="mb-4 flex flex-col gap-1">
            <li class="mx-3.5 mt-4 mb-2">
              <p
                class="block antialiased font-sans text-sm leading-normal text-white font-black uppercase opacity-75"
              >
                auth pages
              </p>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button
                    class="middle none font-sans font-bold center transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg text-white hover:bg-white/10 active:bg-white/30 w-full flex items-center gap-4 px-4 capitalize"
                    type="submit"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      aria-hidden="true"
                      class="w-5 h-5 text-inherit"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                    <p
                      class="block antialiased font-sans text-base leading-relaxed text-inherit font-medium capitalize"
                    >
                      Logout
                    </p>
                  </button>
                </form>
              </li>
          </ul>
        </div>
      </aside>
      <div class="p-4 xl:ml-80">
        <nav
          class="block w-full max-w-full bg-transparent text-white shadow-none rounded-xl transition-all px-0 py-1"
        >
          <div
            class="flex flex-col-reverse justify-between gap-6 md:flex-row md:items-center"
          >
          </div>
        </nav>
        @yield('content')
      </div>
    </div>
  </body>
</html>
