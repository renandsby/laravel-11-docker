<h1>Edita Dúvida {{ $support->id}}</h1>
<form action="{{ route('supports.update', $support->id) }}" method="POST">
    {{-- cria um token para cada envio  --}}
    {{-- <input type="text" value="{{ csrf_token() }}" name="token"> --}}
    @csrf()
    @method('PUT')
    <input type="text" placeholder="Assunto" name="subject" value=" {{ $support->subject}}">
    <textarea name="body" placeholder="Descrição" cols="30" rows="10">{{ $support->body}}</textarea>
    <button type="submit">Editar</button>
</form>