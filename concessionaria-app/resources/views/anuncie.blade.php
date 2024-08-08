@extends('layouts.main')



@section('title', 'Anuncie Conosco')

@section('content')

@auth
@endauth
<div class="container col-md-12 mt-4">
    <div class="col-md-6-offset-md-3">
        <h2 class="text-upper text-center">Por que anunciar com a <span class="blue-text">KeyVehicles</span>?</h2>
        <p class="p-3 text-justify"> Somos líderes de venda em semi-novos em todo o estado! E alguns de nossos atributos são:
        <ol>
            <li>
                <p class="text-bold mt-3">Líder em Springfield</p> Como líderes no mercado local, somos a escolha preferida para quem deseja alcançar um público qualificado e interessado. Nossa reputação de confiança e qualidade atrai clientes que estão prontos para tomar decisões de compra.
            </li>
            <li>
                <p class="text-bold mt-3">Experiência e Credibilidade</p> Em mais de 14 anos, construímos uma base sólida de confiança com nossos clientes. Anunciar conosco significa associar sua marca a uma empresa reconhecida por sua integridade e excelência.
            </li>
            <li>
                <p class="text-bold mt-3">Atendimento ao Cliente Inigualável</p> A satisfação do cliente é o coração de tudo o que fazemos. Nossa equipe treinada e dedicada garante uma experiência de compra e venda tranquila, sem burocracias, tornando o processo mais eficiente e agradável.
            </li>
            <li>
                <p class="text-bold mt-3">Inovação Constante</p>Estamos sempre à frente, buscando novas formas de melhorar nossos serviços e de conectar vendedores e compradores de maneira mais eficaz. Anunciar com a KeyVehicles significa estar alinhado a uma empresa que valoriza a inovação e a melhoria contínua.
            </li>
        </ol>
        Escolher a KeyVehicles é optar por uma parceria com uma empresa que entende o valor de cada cliente e que trabalha incansavelmente para garantir resultados de sucesso. Anuncie conosco e veja sua marca crescer com a confiança de estar com os melhores.

        </p>


    </div>

    
</div>

<div class="image-container">
    <img src="/storage/img/anuncie.png" class="img-anuncie" width="100%" alt="">
    <p class="texto-sobrepor">Fale com nossos melhores vendedores e anuncie seu veículo</p>
    <a href="https://wa.me/5511999999999?text=Olá,%20gostaria%20de%20mais%20informações" class="whatsapp-button-anuncie" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                    Anuncie agora mesmo
    </a>
</div>



@endsection