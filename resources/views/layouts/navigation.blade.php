<!-- Responsive Settings Options -->
<div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">

    @auth
        <div class="px-4">
            <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                {{ Auth::user()->name }}
            </div>
            <div class="font-medium text-sm text-gray-500">
                {{ Auth::user()->email }}
            </div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    @endauth

    @guest
        <div class="px-4">
            <a href="{{ route('login') }}" class="text-blue-500">Login</a> |
            <a href="{{ route('register') }}" class="text-blue-500">Cadastrar</a>
        </div>
    @endguest

</div>