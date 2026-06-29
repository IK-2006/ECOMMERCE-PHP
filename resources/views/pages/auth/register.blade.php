<x-layouts::auth :title="__('Criar Conta')">
    <div class="w-full max-w-md p-8 mx-auto border shadow-2xl rounded-2xl bg-zinc-900/70 backdrop-blur border-zinc-800">

        <div class="flex flex-col gap-6">

            <x-auth-header
                :title="__('Crie sua conta')"
                :description="__('Preencha os dados abaixo para começar.')"
            />

            <!-- Session Status -->
            <x-auth-session-status class="text-center" :status="session('status')" />

            <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-5">
                @csrf

                <flux:input
                    name="name"
                    label="Nome completo"
                    :value="old('name')"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Digite seu nome"
                />

                <flux:input
                    name="email"
                    label="E-mail"
                    :value="old('email')"
                    type="email"
                    required
                    autocomplete="email"
                    placeholder="email@exemplo.com"
                />

                <flux:input
                    name="password"
                    label="Senha"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Digite uma senha"
                    passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                    viewable
                />

                <flux:input
                    name="password_confirmation"
                    label="Confirmar senha"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="Repita a senha"
                    passwordrules="{{ \Illuminate\Validation\Rules\Password::defaults()->toPasswordRulesString() }}"
                    viewable
                />

                <flux:button
                    type="submit"
                    variant="primary"
                    class="w-full py-3 text-base rounded-xl"
                    data-test="register-user-button">
                    Criar conta
                </flux:button>

            </form>

            <div class="text-sm text-center text-zinc-400">
                Já possui uma conta?
                <flux:link :href="route('login')" wire:navigate>
                    Entrar
                </flux:link>
            </div>

        </div>

    </div>
</x-layouts::auth>