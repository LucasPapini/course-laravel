<h3>Fornecedores</h3>

<br/>
    @isset($fornecedores)
        @forelse ($fornecedores as $indeces => $fornecedor)
            fornecedores: {{ $fornecedor['nome'] }}
            <br />
            status: {{ $fornecedor['status'] }}
            <br />
            CNPJ: {{ $fornecedor['cnpj'] ?? 'Valor não preenchido' }}
            <br />
            Telefone: {{ $fornecedor['ddd'] ?? 'Valor não preenchido' }}
            {{ $fornecedor['telefone'] ?? 'Valor não preenchido' }}
            <hr>
            @empty
                Não existe fornecedores cadastrados
        @endforelse
    @endisset
<br/> 