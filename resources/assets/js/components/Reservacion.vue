<template>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h2 class="mg-bn-title" style="color: #8D3C44">Reserva <span class="mg-bn-big" style="color:#8D3C44">Checa disponibilidad</span></h2>
        </div>
        <div class="col-md-9">
            <div class="mg-bn-forms">
                <form>
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <div class="input-group date mg-check-in">
                                <div class="input-group-addon"><i style="color:#8D3C44" class="fa fa-calendar"></i></div>
                                <input type="text" class="form-control change" id="exampleInputEmail1" placeholder="Llegada">
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="input-group date mg-check-out">
                                <div class="input-group-addon"><i style="color:#8D3C44" class="fa fa-calendar"></i></div>
                                <input type="text" class="form-control change" id="exampleInputEmail1" placeholder="Salida">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-xs-6">
                                    <select class="cs-select cs-skin-elastic">
                                        <option value="" disabled selected>Adultos</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="col-xs-6">
                                    <select class="cs-select cs-skin-elastic">
                                        <option value="" disabled selected>Niños</option>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-main btn-block">Reservar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component ready.')
        }
    }
</script>