<!-- Relatório de captura mensal -->
<div class="modal fade btn-modal-capture-monthly" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-full-body">
                <div class="title-modal">
                    <h2>Filtragem</h2>
                </div>
                <form id="demo-form2" action="{{ route('relatory.capture.fishers.filter') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="group">
                        <div class="form-group" style="margin: 5px 0">
                            <label for="month">Mês <span class="required">*</span></label>
                            <select class="select2_single form-control" tabindex="-1" required="required" id="month"
                                name="month">
                                <option value="" disabled selected>Selecionar mês</option>
                                <option value="1">Janeiro</option>
                                <option value="2">Fevereiro</option>
                                <option value="3">Março</option>
                                <option value="4" >Abril</option>
                                <option value="5">Maio</option>
                                <option value="6">Junho</option>
                                <option value="7">Julho</option>
                                <option value="8">Agosto</option>
                                <option value="9">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                        </div>
                    </div>
                    <div class="group">
                        <div class="form-group" style="margin: 5px 0">
                            <label for="year">Ano <span class="required">*</span></label>
                            <input type="number" min="1" value="2021" class="form-control" required="required" name="year"
                                id="year">
                        </div>
                    </div>
                    <div class="modal-send">
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Atribuir Pescado -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-full-body">
                <div class="title-modal">
                    <h2>Atribuir pescado ao armador</h2>
                </div>
                <div id="spinner-ajax"></div>
                <div id="success-msg-ajax" class="alert alert-success"></div>
                <div id="error-msg-ajax" class="alert alert-danger"></div>
                
                <form action="{{ route('user.change.password') }}" method="POST" id="ajaxForm">
                    {{ csrf_field() }}
                    <div class="group">
                        <div class="form-group">
                            <label for="fisher">Armador <span class="required">*</span></label>
                            <select class="select2_single form-control" tabindex="-1" required="required" id="fisher"
                                name="fisher">
                                <option value="" disabled selected>Selecionar armador</option>
                                @forelse($fishers as $fisher)
                                    <option value="{{ $fisher->id }}">{{ $fisher->name }}</option>
                                @empty
                                    <p>Sem armadores registados</p>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="weight">Peso <span class="required">*</span></label>
                            <input type="number" min="1" value="500" class="form-control" required="required" name="weight"
                                id="weight">
                        </div>
                    </div>
                    <div class="group">
                        <div class="form-group">
                            <label for="specie">Espécie <span class="required">*</span></label>
                            <select class="select2_single form-control" tabindex="-1" required="required" id="specie"
                                name="specie">
                                <option value="" disabled selected>Selecionar espécie</option>
                                @foreach($species as $specie)
                                    <option value="{{ $specie->id }}">{{ $specie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="resource">Recurso <span class="required">*</span></label>
                            <select class="select2_single form-control" tabindex="-1" required="required" id="resource"
                                name="resource">
                                <option value="" disabled selected>Aguardando campo espécie</option>
                            </select>
                        </div>
                    </div>
                    <div class="group">
                        <div class="form-group">
                            <label for="conservation">Estado de conservação <span class="required">*</span></label>
                            <select class="select2_single form-control" tabindex="-1" required="required" id="conservation"
                                name="conservation">
                                <option value="" disabled selected>Selecionar estado</option>
                                @foreach($fish_states as $fish_state)
                                    <option value="{{ $fish_state->id }}">{{ $fish_state->state }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fishing-date">Data de captura <span class="required">*</span></label>
                            <input id="fishing-date" class="date-picker form-control"
                                value="{{ old('fishing-date') }}" name="fishing-date"
                                placeholder="dd-mm-yyyy" type="text" required="required" type="text"
                                onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'"
                                onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                            <script>
                                function timeFunctionLong(input) {
                                    setTimeout(function () {
                                        input.type = 'text';
                                    }, 60000);
                                }

                            </script>
                        </div>
                    </div>
                    <div class="modal-send">
                        <button type="submit" class="btn btn-success registar-pescado">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Alterar Senha -->

<div class="modal-wrapper" id="user-new-password">
    <div class="modal-full-body">
        <div class="title-modal">
            <h2>Mudar senha</h2>
        </div>
        <form action="{{ route('user.change.password') }}" method="POST" id="demo-form2">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input type="email" class="form-control" required="required" name="email"
                    value="{{ old('email') }}" id="email">
            </div>
            <div class="form-group">
                <label for="password">Nova senha <span class="required">*</span></label>
                <input type="password" class="form-control" required="required" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="password-same">Confirma senha <span class="required">*</span></label>
                <input type="password" class="form-control" required="required" name="password-same" id="password-same">
            </div>
            <p class="validation-same-password"></p>
            <div class="modal-send">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
        <button class="close-modal"><i class="fa fa-times" aria-hidden="true"></i></button>

    </div>
</div>

<!-- Alterar Fotografia -->
<div class="modal-wrapper" id="fisher-new-photo">
    <div class="modal-full-body">
        <div class="title-modal">
            <h2>Mudar Fotografia</h2>
        </div>
        <form action="{{ route('fisher.change.photo') }}" method="POST" enctype="multipart/form-data" id="demo-form2">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="bi">Nº BI ou NIF <span class="required">*</span></label>
                <input type="text" class="form-control" data-inputmask="'mask' : '999999999AA999'" required="required" name="bi"
                    value="{{ old('bi') }}" id="bi">
            </div>
            <div class="form-group">
                <input type="file" id="photo" name="photo" required="required" class="form-control ">
            </div>
            <div class="modal-send">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
        <button class="close-modal"><i class="fa fa-times" aria-hidden="true"></i></button>

    </div>

</div>
