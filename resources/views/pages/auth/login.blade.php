<x-layouts::auth :title="__('Log in')">
    <div class="w-full max-w-md p-8 mx-auto border shadow-2xl rounded-2xl bg-zinc-900/70 backdrop-blur border-zinc-800">

        <div class="flex flex-col gap-6">
            <x-auth-header
                :title="__('Bem-vindo de volta!')"
                :description="__('Entre com seu e-mail e senha para continuar.')"
            />

            <x-auth-session-status class="text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
                @csrf

                <flux:input
                    name="email"
                    label="Email"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@exemplo.com"
                />

                <div class="relative">
                    <flux:input
                        name="password"
                        label="Senha"
                        type="password"
                        required
                        autocomplete="current-password"
                        placeholder="Digite sua senha"
                        viewable
                    />

                    @if (Route::has('password.request'))
                        <flux:link class="absolute text-sm top-0 end-0"
                            :href="route('password.request')" wire:navigate>
                            Esqueceu sua senha?
                        </flux:link>
                    @endif
                </div>

                <flux:checkbox
                    name="remember"
                    label="Lembrar de mim"
                />

                <flux:button
                    variant="primary"
                    type="submit"
                    class="w-full py-3 text-base rounded-xl">
                    Entrar
                </flux:button>
            </form>

            @if (Route::has('register'))
                <div class="text-sm text-center text-zinc-400">
                    Não possui uma conta?
                    <flux:link :href="route('register')" wire:navigate>
                        Criar conta
                    </flux:link>
                </div>
            @endif
        </div>

    </div>
</x-layouts::auth>