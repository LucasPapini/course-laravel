<h3>Fornecedores</h3>



@php
    /*
    
    if(){
    }elseif(){
    }else{
    }
    
    @if (count($fornecedores) > 0 && count($fornecedores) < 10)
        <h3>Existem alguns fornecedores cadastrados</h3>
    @elseif(count($fornecedores) > 10)
    <h3>Existem mais de 10 fornecedores cadastrados</h3>
    @else
    <h3>Ainda não exite fornecedores cadastrados</h3>
        @endif


        Enquanto o @if verefica se o return foi true 
        o @unless verefica/executa se o retorno foi falso.

        @dd funciona igual um var_dump

        */
        
        /*
        *Fornecedor: {{ $fornecedores[0]['nome'] }}
            <br>
            Status: {{ $fornecedores[0]['status'] }}

            @if ($fornecedores[0]['status'] == 'N')
                <p>Fornecedor inativo | if</p>
            @endif

            <!-- Executa se o retorno da condição for false -->
            @unless ($fornecedores[0]['status'] == 'S')
                <p>Fornecedor inativo | unless</p>
            @endunless
        */
        
        /*
        @isset($fornecedores)
            fornecedores: {{ $fornecedores[1]['nome'] }}
            <br/>
            status: {{ $fornecedores[1]['status'] }}
            <br/>
            @isset($fornecedores[1]['cnpj'])
            cnpj: {{ $fornecedores[1]['cnpj'] }}
            @endisset
            @endisset
                @isset($fornecedores)
            fornecedores: {{ $fornecedores[1]['nome'] }}
                <br/>
                status: {{ $fornecedores[1]['status'] }}
                <br/>
                @isset($fornecedores[1]['cnpj'])
            cnpj: {{ $fornecedores[1]['cnpj'] }}
                    @empty($fornecedores[1]['cnpj'])
            - Vazio
            @endempty
            @endisset
            @endisset

            @isset($fornecedores)
    fornecedores: {{ $fornecedores[1]['nome'] }}
    <br />
    status: {{ $fornecedores[1]['status'] }}
    <br />
    CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Valor não preenchido' }}
    <br />
    Telefone: {{ $fornecedores[1]['ddd'] ?? 'Valor não preenchido' }}
    {{ $fornecedores[1]['telefone'] ?? 'Valor não preenchido' }}
    <br />
@endisset
    */
@endphp

<br/>
    @for($i = 0; isset($fornecedores[$i]); $i++)
        fornecedores: {{ $fornecedores[1]['nome'] }}
        <br />
        status: {{ $fornecedores[$i]['status'] }}
        <br />
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Valor não preenchido' }}
        <br />
        Telefone: {{ $fornecedores[$i]['ddd'] ?? 'Valor não preenchido' }}
        {{ $fornecedores[$i]['telefone'] ?? 'Valor não preenchido' }}
        <hr>
        <br />
    @endfor
<br/>