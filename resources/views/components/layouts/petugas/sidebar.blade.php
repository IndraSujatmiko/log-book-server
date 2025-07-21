<flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

    <a href="{{ route('petugas.dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
        <x-app-logo />
    </a>

    <flux:navlist variant="outline">
        <flux:navlist.group :heading="__('Menu Petugas')" class="grid">
            <flux:navlist.item icon="home" :href="route('petugas.dashboard')" :current="request()->routeIs('petugas.dashboard')" wire:navigate>
                Dashboard
            </flux:navlist.item>

            <flux:navlist.item icon="calendar-days" :href="route('petugas.rekap')" :current="request()->routeIs('petugas.rekap')" wire:navigate>
                Rekap Kunjungan
            </flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>

    <flux:spacer />

    <flux:dropdown class="hidden lg:block" position="bottom" align="start">
        <flux:profile
            :name="auth()->user()->name"
            :initials="auth()->user()->initials()"
            icon:trailing="chevrons-up-down"
        />

        <flux:menu class="w-[220px]">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                    {{ __('Log Out') }}
                </flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>
