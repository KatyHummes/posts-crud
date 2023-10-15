<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-[#12c2e9] via-[#c471ed] to-[#f64f59]">
    <div class="container px-4 md:mx-auto mt-20">
        <div class="grid grid-cols-1 md:grid-cols-4 xl:px-20">
            <div class="pr-4">
                @if (session('success'))
                    <div class="text-green-500 text-lg font-bold">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="text-red-500 text-lg font-bold">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('create') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Título</label>
                        <input type="text" id="title" name="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Digite o título do seu Post">
                    </div>

                    <div>
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Mensagem</label>
                        <textarea id="message" rows="10" name="message"300
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gradient-to-r from-blue-200 to-transparent rounded-lg border border-gray- focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none"
                            placeholder="Escreva aqui a sua mensagem..."></textarea>
                    </div>
                    <button class="bg-green-300 mt-4 py-2 px-12 rounded-2xl" type="submit">Enviar</button>
                </form>
            </div>
            <div class="col-span-3">
                <form action="{{ route('filter') }}" method="GET">
                    @csrf

                    <h1 class="">Filtros</h1>
                    <div class="mb-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Título</label>
                        <input type="text" id="title" name="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                            placeholder="Pesquise pelo título do seu Post">
                    </div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="mb-6">
                            <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900">Data
                                inicial</label>
                            <input type="date" id="start_date" name="start_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                placeholder="Digite o título do seu Post">
                        </div>
                        <div class="mb-6">
                            <label for="final_date" class="block mb-2 text-sm font-medium text-gray-900">Data
                                final</label>
                            <input type="date" id="final_date" name="final_date"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                placeholder="Digite o título do seu Post">
                        </div>
                    </div>
                    <div class="flex gap-8">
                        <button class="bg-blue-300 mb-6 py-2 px-12 rounded-2xl" type="submit">Pesquisar</button>
                        @if (session('deletePost'))
                            <div class="text-blue-400 text-lg font-bold">{{ session('deletePost') }}</div>
                        @endif
                        @if (session('updated'))
                            <div class="text-green-500 text-lg font-bold">{{ session('updated') }}</div>
                        @endif
                    </div>
                </form>
                <div class="relative overflow-x-auto mb-8">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Título
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Mensagem
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Data
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $post->id }}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $post->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $post->message }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{-- y minusculo exibe os 2 ultimos digitos e Y maiusculo exibe tudo --}}
                                        {{ date('d-m-y', strtotime($post->created_at)) }}
                                    </td>
                                    <td class="px-6 py-4 mt-2 flex items-center justify-center gap-2">

                                        <a href="{{ route('edit', $post->id) }}" class="h-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('view', $post->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                              </svg>
                                              
                                        </a>

                                        <button class="show-modal" data-post-id="{{ $post->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>

                                        <form id="delete-form-{{ $post->id }}"
                                            action="{{ route('delete', $post->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div id="modal-container" class="modal-container">
                        <div class="modal flex flex-col justify-between">
                            <p>Tem certeza de que deseja excluir este item?</p>
                            <div class="flex justify-around">
                                <button class="text-red-600 text-base font-medium" id="cancel-delete">Não</button>
                                <button class="text-green-600 text-base font-medium" id="confirm-delete">Sim</button>
                            </div>
                        </div>
                    </div>


                    <div class="mt-4">
                        {{ $posts->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
    const modalContainer = document.getElementById('modal-container');
    const showModalButtons = document.querySelectorAll('.show-modal');
    const confirmDeleteButton = document.getElementById('confirm-delete');
    const cancelDeleteButton = document.getElementById('cancel-delete');
    const deleteForm = document.getElementById('delete-form');

    showModalButtons.forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.getAttribute('data-post-id');
            const postDeleteForm = document.querySelector(`#delete-form-${postId}`);

            modalContainer.style.display = 'block';

            confirmDeleteButton.addEventListener('click', function() {
                postDeleteForm.submit();
                modalContainer.style.display = 'none';
            });

            cancelDeleteButton.addEventListener('click', function() {
                modalContainer.style.display = 'none';
            });
        });
    });

    modalContainer.addEventListener('click', function(event) {
        if (event.target === modalContainer) {
            modalContainer.style.display = 'none';
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modalContainer.style.display === 'block') {
            modalContainer.style.display = 'none';
        }
    });
</script>




<style>
    .modal-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    .modal {
        background-color: #fff;
        width: 300px;
        margin: 0 auto;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center;
    }
</style>
