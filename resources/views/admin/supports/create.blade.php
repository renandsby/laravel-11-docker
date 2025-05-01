<h1>Nova Dúvida</h1>
<form action="{{ route('supports.store') }}" method="POST">
    {{-- cria um token para cada envio  --}}
    {{-- <input type="text" value="{{ csrf_token() }}" name="token"> --}}
    @csrf()
    <input type="text" placeholder="Assunto" name="subject">
    <textarea name="body" placeholder="Descrição" cols="30" rows="10"></textarea>
    <button type="submit">Enviar</button>
</form>