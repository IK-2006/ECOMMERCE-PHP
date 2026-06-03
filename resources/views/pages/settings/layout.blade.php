<div class="flex items-start gap-8 max-md:flex-col">
    <div class="w-full shrink-0 pb-4 md:w-[220px]">
        <flux:navlist aria-label="{{ __('Configuracoes') }}">
            <flux:navlist.item :href="route('profile.edit')" :current="request()->routeIs('profile.edit')" wire:navigate>{{ __('Perfil') }}</flux:navlist.item>
            <flux:navlist.item :href="route('security.edit')" :current="request()->routeIs('security.edit')" wire:navigate>{{ __('Seguranca') }}</flux:navlist.item>
            <flux:navlist.item :href="route('appearance.edit')" :current="request()->routeIs('appearance.edit')" wire:navigate>{{ __('Aparencia') }}</flux:navlist.item>
        </flux:navlist>
    </div>

    <flux:separator class="md:hidden" />

    <div class="min-w-0 flex-1 self-stretch max-md:pt-6">
        <flux:heading>{{ $heading ?? '' }}</flux:heading>
        <flux:subheading>{{ $subheading ?? '' }}</flux:subheading>

        <div class="mt-5 w-full max-w-2xl rounded-lg border border-zinc-200 bg-white p-6 shadow-xs dark:border-zinc-700 dark:bg-zinc-900">
            {{ $slot }}
        </div>
    </div>
</div>
