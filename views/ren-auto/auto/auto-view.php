<?php

use app\models\CatEstatus;
use app\models\CatMetodopago;
use app\models\RenModelo;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$userId = Yii::$app->user->getId();

?>
<div class="principal isDark features">
    <div class="car-image">

        <img src=<?= $auto->Imagen ?> alt="Auto banner">
        <?= $userId ?>

    </div>
    <div class="info">
        <div class="car-info">
            <div>
                <h1><?= $auto->modNombre ?></h1>
            </div>
            <div> $<?= $auto->aut_precio ?><strong>por día</strong></div>
            <div class="info-seccion">
                <?= Html::img(Url::to('@web/img/iconos/cocheIcon.png'), ['alt' => 'Icono coche']) ?>
                <div><span><?= $auto->carroceria ?></span></div>
            </div>
            <div class="info-seccion">
                <?= Html::img(Url::to('@web/img/iconos/palancaIcon.png'), ['alt' => 'Icono coche']) ?>
                <div><span><?= $auto->transmision ?></span></div>
            </div>
            <div class="valor"></div>
        </div>

        <div class="inputs">
            <?php $form = ActiveForm::begin(['id' => 'form', 'method' => 'POST']); ?>

            <?= $form->field($renta, 'ren_fechaInicio')->input('date', ['id' => 'inicio']) ?>
 
            <?= $form->field($renta, 'ren_fechaFinal')->input('date', ['id' => 'final']) ?>

            <?= $form->field($renta, 'ren_fkmetodoPago')->dropdownList(CatMetodopago::map(), ['prompt' => 'Seleccione el método de pago']) ?>

            <?= $form->field($renta, 'ren_fkcliente')->hiddenInput(['value' => $userId, 'hidden' => true]) ?>

            <?= $form->field($renta, 'ren_fkauto')->hiddenInput(['value' => $auto->aut_id, 'hidden' => true]) ?>

            <?= $form->field($renta, 'ren_monto')->hiddenInput(['id' => 'inputHidden', 'hidden' => true]) ?>
            
            <span>Total a pagar: $<span id="monto" name="num">0</span></span>

            <?= Html::submitButton(Yii::t('app', 'Save'), ['id' => 'btn']) ?>

            <!-- <input type="hidden" id="inputHidden" name="dias2"> -->
            <?php ActiveForm::end(); ?>



            <script>
                const btn = document.querySelector('#btn');
                const inicio = document.querySelector('#inicio');
                const final = document.querySelector('#final');
                const form = document.querySelector('#form');
                const valor = document.querySelector('.valor');
                const inputHidden = document.querySelector('#inputHidden');
                const monto = document.querySelector('#monto');

                // form.onsubmit = (e) => {
                //     e.preventDefault()
                // }
                //final: array {dia, mes,año}
                function diasHasta(inicio, final) {
                    var Hoy = new Date(inicio.ObjetoAnio, inicio.ObjetoMes, inicio.ObjetoDia);
                    var fin = new Date(final.ObjetoAnio, final.ObjetoMes, final.ObjetoDia);
                    var mseg_dia = 1000 * 60 * 60 * 24;
                    var dias;
                    if (Hoy.getMonth() == final.mes && Hoy.getDate() > final.dia)
                        fin.setFullYear(fin.getFullYear() + 1);
                    dias = Math.ceil((fin.getTime() - Hoy.getTime()) / (mseg_dia));
                    // document.write("Faltan " + dias + " dias hasta " + fin.toLocaleDateString())
                    return dias;
                }

                const extractDate = (fecha) => {
                    let character;
                    let contadorDeBarritas = 0;
                    let anio = '';
                    let mes = '';
                    let dia = '';
                    for (let i = 0; i < fecha.length; i++) {

                        if (fecha[i] != '/' && contadorDeBarritas == 0) {
                            anio += fecha[i] + fecha[i + 1] + fecha[i + 2] + fecha[i + 3];
                            contadorDeBarritas += 1;
                        }
                        if (contadorDeBarritas == 1 && i > 4) {
                            mes += fecha[i] + fecha[i + 1];
                            contadorDeBarritas += 1;
                        } else if (contadorDeBarritas == 2 && i > 7) {
                            dia += fecha[i];
                        }

                    }
                    const objetoFechaInicio = {
                        ObjetoAnio: anio,
                        ObjetoMes: mes - 1,
                        ObjetoDia: dia,
                    }
                    return objetoFechaInicio;
                }
                //AGREGAMOS EVENTO AL PRIMER INPUT DATE
                inicio.addEventListener('change', () => {
                    let date = inicio.value.replace(/-+/g, '/');
                    let finalDate = final.value.replace(/-+/g, '/');
                    let fechaEscogida = extractDate(date);
                    let fechaEscogidaFinal = extractDate(finalDate);
                    let fecha = new Date(fechaEscogida.ObjetoAnio, fechaEscogida.ObjetoMes, fechaEscogida.ObjetoDia);
                    let fechaFinal = new Date(fechaEscogidaFinal.ObjetoAnio, fechaEscogidaFinal.ObjetoMes, fechaEscogidaFinal.ObjetoDia);
                    let dias = diasHasta(fechaEscogida, fechaEscogidaFinal);
                    let total = dias * (<?= $auto->aut_precio ?>);
                    (total < 0) ? '' : form.value = total, monto.innerHTML = total;

                })
                //AGREGAMOS EVENTO AL SEGUNDO INPUT DATE
                final.addEventListener('change', () => {
                    let date = inicio.value.replace(/-+/g, '/');
                    let finalDate = final.value.replace(/-+/g, '/');
                    let fechaEscogida = extractDate(date);
                    let fechaEscogidaFinal = extractDate(finalDate);
                    let fecha = new Date(fechaEscogida.ObjetoAnio, fechaEscogida.ObjetoMes, fechaEscogida.ObjetoDia);
                    let fechaFinal = new Date(fechaEscogidaFinal.ObjetoAnio, fechaEscogidaFinal.ObjetoMes, fechaEscogidaFinal.ObjetoDia);
                    let dias = diasHasta(fechaEscogida, fechaEscogidaFinal);
                    let total = dias * (<?= $auto->aut_precio ?>);
                    form.value = total; 
                    monto.innerHTML = total;
                    inputHidden.value = total;
                })

                btn.addEventListener('click', () => {
                    valor.innerHTML = inicio.value;
                //     fetch('http://rentacar.test/ren-renta/create', {
                //     method: 'POST'
                // })

                });


            </script>


        </div>
    </div>
</div>