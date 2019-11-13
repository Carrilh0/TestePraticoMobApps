<form method="post" action="">

    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{isset($empresa->id) ? $empresa->id : ''}}">

	<div class="row">
	  	<div class="col-md-6">
			<div class="form-group">
			    <label for="nome">Nome *</label>
			    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome da empresa!" 
			    value="{{isset($empresa->nome) ? $empresa->nome : ''}}">
			</div>
		</div>

		


		<div class="col-md-12" style="text-align:right">
			<button type="submit" class="btn btn-success" id="salvar-empresa" style="float-right">Salvar</button>
		</div>

		<div class="modal-footer"></div>
	</div>
</form>

<script>
	$(document).ready(function() {
		$('#salvar-empresa').click(function() {
			if ($('#nome').val() == '') {
				modalValidacao("Ò campo Nome é obrigatório!"); 
				return false;

			} else if ($('#email').val() == '') {
				modalValidacao("Ò campo E-mail é obrigatório!"); 
				return false;

			}  else if ( ! emailValido($('#email').val())) {
				modalValidacao("Digite um E-mail valido!"); 
				return false;

			} else if ($('#cnpj').val() == '') {
				modalValidacao("Ò campo CNPJ é obrigatório!"); 
				return false;

			}  else if ($('#segmento_id').val() == 'selecione') {
				modalValidacao("Ò campo Segmento é obrigatório!"); 
				return false;
			} else {
				return true;
			}

		});
	});
</script>
