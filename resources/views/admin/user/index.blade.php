@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1>INI USER INDEX</h1>
<button type="button" @click="$dispatch('open-form-in-modal')"
    class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-500 px-4 py-3 text-sm font-medium text-white shadow-theme-xs transition hover:bg-brand-600">
    Tambah User
</button>
<x-tables.table2 :users="$users"/>
<div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
    <!-- Modal -->
    <div
        x-data="{
            open: false,
            init() {
                this.$watch('open', value => {
                    document.body.style.overflow = value ? 'hidden' : 'unset';
                });
            }
        }"
        x-show="open" x-cloak
        @keydown.escape.window="open = false" @open-form-in-modal.window="open = true" class="fixed inset-0 z-99999 flex items-center justify-center overflow-y-auto p-5">

        <!-- Backdrop -->
        <div
            @click="open = false"
            class="fixed inset-0 h-full w-full bg-blue-900/50 backdrop-blur-[32px]"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
        </div>

        <!-- Modal Content -->
        <div
            @click.stop
            class="relative z-10 w-full max-w-[584px] rounded-3xl bg-white dark:bg-gray-900"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="scale-95 opacity-0"
            x-transition:enter-end="scale-100 opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="scale-100 opacity-100"
            x-transition:leave-end="scale-95 opacity-0"
        >

            <!-- Close Button -->
            <button
                type="button"
                @click="$refs.userForm.reset(); open = false"
                class="absolute right-3 top-3 z-20 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11"
            >
                <svg
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M6.04289 16.5413L10.5845 11.9997L6.04289 7.45811C5.65237 7.06759 5.65237 6.43442 6.04289 6.0439C6.43342 5.65338 7.06658 5.65338 7.45711 6.0439L11.9987 10.5855L16.5408 6.04338C16.9313 5.65286 17.5645 5.65286 17.955 6.04338C18.3455 6.43391 18.3455 7.06707 17.955 7.4576L13.4129 11.9997L17.955 16.5418C18.3455 16.9323 18.3455 17.5655 17.955 17.956C17.5645 18.3466 16.9313 18.3466 16.5408 17.956L11.9987 13.4139L7.45711 17.9555C7.06658 18.346 6.43342 18.346 6.04289 17.9555C5.65237 17.565 5.65237 16.9318 6.04289 16.5413Z"
                        fill="currentColor"
                    />
                </svg>
            </button>

            <!-- Modal Body -->
            <div class="rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">

                <form x-ref="userForm">

                    <h4 class="mb-6 text-lg font-medium text-gray-800 dark:text-white/90">
                        Personal Information
                    </h4>

                    <div class="grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2">

                        <!-- Username -->
                        <div class="sm:col-span-2">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Username<span class="text-orange-600">*</span>
                            </label>

                            <input type="text" placeholder="Masukan Username" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Nama -->
                        <div class="sm:col-span-2">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Nama<span class="text-orange-600">*</span>
                            </label>

                            <input type="text" placeholder="Masukan Nama" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Password<span class="text-error-500">*</span>
                            </label>
                            <div x-data="{ showPassword: false }" class="relative">
                                <input :type="showPassword ? 'text' : 'password'" name="password"
                                    placeholder="Masukan password"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30
                                    @error('password') !border-red-500 !focus:border-red-500 !focus:ring-red-500/10 @enderror"/>
                                <span @click="showPassword = !showPassword"
                                    class="absolute top-1/2 right-4 z-30 -translate-y-1/2 cursor-pointer text-gray-500 dark:text-gray-400">
                                    <svg x-show="!showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619ZM10.0002 4.04297C6.48191 4.04297 3.49489 6.30917 2.4155 9.4593C2.3615 9.61687 2.3615 9.78794 2.41549 9.94552C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C13.5184 15.3619 16.5055 13.0957 17.5849 9.94555C17.6389 9.78797 17.6389 9.6169 17.5849 9.45932C16.5055 6.30919 13.5184 4.04297 10.0002 4.04297ZM9.99151 7.84413C8.96527 7.84413 8.13333 8.67606 8.13333 9.70231C8.13333 10.7286 8.96527 11.5605 9.99151 11.5605H10.0064C11.0326 11.5605 11.8646 10.7286 11.8646 9.70231C11.8646 8.67606 11.0326 7.84413 10.0064 7.84413H9.99151Z" fill="#98A2B3" />
                                    </svg>
                                    <svg x-show="showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936C2.3615 9.61694 2.3615 9.78801 2.41549 9.94558C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C11.255 15.3619 12.4422 15.0737 13.4994 14.5598L15.3625 16.4229C15.6554 16.7158 16.1302 16.7158 16.4231 16.4229C16.716 16.13 16.716 15.6551 16.4231 15.3622L4.63803 3.57709ZM12.3608 13.4212L10.4475 11.5079C10.3061 11.5423 10.1584 11.5606 10.0064 11.5606H9.99151C8.96527 11.5606 8.13333 10.7286 8.13333 9.70237C8.13333 9.5461 8.15262 9.39434 8.18895 9.24933L5.91885 6.97923C5.03505 7.69015 4.34057 8.62704 3.92328 9.70247C4.86803 12.1373 7.23361 13.8619 10.0002 13.8619C10.8326 13.8619 11.6287 13.7058 12.3608 13.4212ZM16.0771 9.70249C15.7843 10.4569 15.3552 11.1432 14.8199 11.7311L15.8813 12.7925C16.6329 11.9813 17.2187 11.0143 17.5849 9.94561C17.6389 9.78803 17.6389 9.61696 17.5849 9.45938C16.5055 6.30925 13.5184 4.04303 10.0002 4.04303C9.13525 4.04303 8.30244 4.17999 7.52218 4.43338L8.75139 5.66259C9.1556 5.58413 9.57311 5.54303 10.0002 5.54303C12.7667 5.54303 15.1323 7.26768 16.0771 9.70249Z"
                                            fill="#98A2B3" />
                                    </svg>
                                </span>
                            </div>
                            @error('password')
                                <small class="text-error-500">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Role<span class="text-orange-600">*</span>
                            </label>

                            <select name="" id="" class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800">
                                <option value="" disabled selected>-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                            
                        </div>

                    </div>

                    <!-- Actions -->
                    <div class="mt-6 flex w-full items-center justify-end gap-3">

                        <button type="button" @click="$refs.userForm.reset(); open = false"
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 shadow-theme-xs transition-colors hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] sm:w-auto">
                            Close
                        </button>

                        <button
                            type="button"
                            @click="open = false"
                            class="w-full rounded-lg bg-brand-500 px-4 py-3 text-sm font-medium text-white shadow-theme-xs hover:bg-brand-600 sm:w-auto"
                        >
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>
@endsection
