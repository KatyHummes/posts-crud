<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-[#12c2e9] via-[#c471ed] to-[#f64f59] px-4">

    <div class="flex items-center justify-center h-screen">
        <a href="{{ route('index')}}" class="absolute top-0 left-4 flex gap-2 font-medium text-purple-700 mt-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
              </svg>
              Voltar</a>
        <div class="w-full max-w-2xl">

            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Título</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Digite o título do seu Post">
            </div>
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Mensagem</label>
                <textarea id="message" rows="10" name="message"300 readonly
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gradient-to-r from-blue-200 to-transparent rounded-lg border border-gray- focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none"
                    placeholder="Escreva aqui a sua mensagem...">{{ $post->message }}</textarea>
            </div>
           
        </div>
    </div>

</body>

</html>
