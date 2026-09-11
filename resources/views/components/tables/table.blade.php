@props(['users'])

<div class="overflow-hidden rounded-xl border border-gray-200 bg-white">

    <div class="overflow-x-auto">
        <table class="w-full">

            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                        No
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                        Username
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                        Nama
                    </th>

                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                        Role
                    </th>

                    <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">
                        Aksi
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">

                @forelse ($users as $user)

                    <tr class="hover:bg-gray-50">

                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4 text-sm font-medium text-gray-800">
                            {{ $user->username }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $user->nama }}
                        </td>

                        <td class="px-6 py-4 text-sm">
                            {{ $user->role }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center gap-2">

                                {{-- EDIT --}}
                                <a
                                    href="#"
                                    class="rounded-lg p-2 text-gray-500 hover:bg-blue-50 hover:text-blue-600"
                                    title="Edit"
                                >
                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-9.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 7.5-7.5z"
                                        />
                                    </svg>
                                </a>

                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('user.destroy', $user->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="rounded-lg p-2 text-gray-500 hover:bg-red-50 hover:text-red-600"
                                        title="Hapus"
                                    >
                                        <svg
                                            class="h-5 w-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10"
                                            />
                                        </svg>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td
                            colspan="5"
                            class="px-6 py-8 text-center text-sm text-gray-500"
                        >
                            Belum ada data user.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>