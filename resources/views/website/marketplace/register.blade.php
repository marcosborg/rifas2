@extends('layouts.website')

@section('content')
<section id="pricing" class="pricing section">

    <!-- Section Title -->
    <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Planos</h2>
        <p>Escolha o plano que melhor se ajusta ao seu negócio e aos seus objetivos de vendas e de ajuda a causas solidárias.
        </p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
                <div class="pricing-item featured">
                    <h3>Vendedores de produtos</h3>
                    <h4><sup>€</sup>0<span> + % das vendas</span></h4>
                    <ul>
                        <li><i class="bi bi-check"></i> <span>Loja online</span></li>
                        <li><i class="bi bi-check"></i> <span>Selo de comerciante solidário</span></li>
                        <li><i class="bi bi-check"></i> <span>Venda de produtos</span></li>
                        <li class="na"><i class="bi bi-x"></i> <span>Venda de serviços</span></li>
                        <li class="na"><i class="bi bi-x"></i> <span>Valor da assinatura reverte para causas</span></li>
                        <li><i class="bi bi-check"></i> <span>Percentagem das vendas reverte para causas</span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary">Assinar agora</a>
                </div>
            </div><!-- End Pricing Item -->

            <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
                <div class="pricing-item">
                    <h3>Vendedores de produtos / serviços</h3>
                    <h4><sup>€</sup>15<span> / mês + % das vendas</span></h4>
                    <ul>
                        <li><i class="bi bi-check"></i> <span>Loja online</span></li>
                        <li><i class="bi bi-check"></i> <span>Selo de comerciante solidário</span></li>
                        <li><i class="bi bi-check"></i> <span>Venda de produtos</span></li>
                        <li><i class="bi bi-check"></i> <span>Venda de serviços</span></li>
                        <li><i class="bi bi-check"></i> <span>Valor da assinatura reverte para causas</span></li>
                        <li><i class="bi bi-check"></i> <span>Percentagem das vendas reverte para causas</span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary">Assinar agora</a>
                </div>
            </div><!-- End Pricing Item -->

            <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                <div class="pricing-item">
                    <h3>Vendedores de serviços</h3>
                    <h4><sup>€</sup>29<span> / mês</span></h4>
                    <ul>
                        <li><i class="bi bi-check"></i> <span>Loja online</span></li>
                        <li><i class="bi bi-check"></i> <span>Selo de comerciante solidário</span></li>
                        <li class="na"><i class="bi bi-x"></i> <span>Venda de produtos</span></li>
                        <li><i class="bi bi-check"></i> <span>Venda de serviços</span></li>
                        <li><i class="bi bi-check"></i> <span>Valor da assinatura reverte para causas</span></li>
                        <li class="na"><i class="bi bi-x"></i> <span>Percentagem das vendas reverte para causas</span>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary">Assinar agora</a>
                </div>
            </div><!-- End Pricing Item -->

        </div>

    </div>

</section>

@endsection
@section('styles')
@parent
<style>
    /*--------------------------------------------------------------
# Pricing Section
--------------------------------------------------------------*/
    .pricing {
        --background-color: color-mix(in srgb, var(--heading-color), transparent 95%);
        margin-top: 40px;
    }

    .pricing .pricing-item {
        background-color: var(--contrast-color);
        box-shadow: 0 3px 20px -2px color-mix(in srgb, var(--default-color), transparent 90%);
        border-top: 4px solid var(--background-color);
        padding: 60px 40px;
        height: 100%;
        border-radius: 5px;
    }

    .pricing h3 {
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 20px;
    }

    .pricing h4 {
        color: var(--accent-color);
        font-size: 48px;
        font-weight: 400;
        font-family: var(--heading-font);
        margin-bottom: 0;
    }

    .pricing h4 sup {
        font-size: 28px;
    }

    .pricing h4 span {
        color: color-mix(in srgb, var(--default-color), transparent 50%);
        font-size: 18px;
    }

    .pricing ul {
        padding: 20px 0;
        list-style: none;
        color: color-mix(in srgb, var(--default-color), transparent 30%);
        text-align: left;
        line-height: 20px;
    }

    .pricing ul li {
        padding: 10px 0;
        display: flex;
        align-items: center;
    }

    .pricing ul i {
        color: #059652;
        font-size: 24px;
        padding-right: 3px;
    }

    .pricing ul .na {
        color: color-mix(in srgb, var(--default-color), transparent 60%);
    }

    .pricing ul .na i {
        color: color-mix(in srgb, var(--default-color), transparent 60%);
    }

    .pricing ul .na span {
        text-decoration: line-through;
    }

    .pricing .buy-btn {
        color: var(--accent-color);
        background-color: var(--background-color);
        display: inline-block;
        padding: 8px 35px 10px 35px;
        border-radius: 50px;
        transition: none;
        font-size: 16px;
        font-weight: 500;
        font-family: var(--heading-font);
        transition: 0.3s;
        border: 1px solid var(--accent-color);
    }

    .pricing .buy-btn:hover {
        background: var(--accent-color);
        color: var(--contrast-color);
    }

    .pricing .featured {
        border-top-color: var(--accent-color);
    }

    .pricing .featured .buy-btn {
        background: var(--accent-color);
        color: var(--contrast-color);
    }

    @media (max-width: 992px) {
        .pricing .box {
            max-width: 60%;
            margin: 0 auto 30px auto;
        }
    }

    @media (max-width: 767px) {
        .pricing .box {
            max-width: 80%;
            margin: 0 auto 30px auto;
        }
    }

    @media (max-width: 420px) {
        .pricing .box {
            max-width: 100%;
            margin: 0 auto 30px auto;
        }
    }
</style>
@endsection