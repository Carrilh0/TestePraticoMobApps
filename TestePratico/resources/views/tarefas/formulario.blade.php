<form method="post" action="{{isset($tarefa->id) ? route('tarefa.update') :route('tarefa.create')}}">

    {{ csrf_field() }}

    <input type="hidden" name="id" value="{{isset($tarefa->id) ? $tarefa->id : ''}}">

	<div class="row">
	  	<div class="col-md-6">
			<div class="form-group">
			    <label for="nome">Nome *</label>
			    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite a tarefa!" 
			    value="{{isset($tarefa->nome) ? $tarefa->nome : ''}}">
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
			    <label for="segmento">Status da atividade *</label>
			    <select class="form-control" name="status_id" id="status_id">
			    	<option value="" disabled>Selecione um status</option>		    	
					@if (isset($tarefa->id))
				    	@foreach ($statuses as $status)
				    	  @if ($tarefa->status_id == $status->id)
				    	    <option value="{{$status->id}}" selected="selected">{{$status->nome}}</option>
				    	  @else
				    	    <option value="{{$status->id}}">{{$status->nome}}</option>
				    	  @endif
				    	@endforeach
					@else
						@for ($i = 0; $i < 2; $i++ )
						  <option value="{{$statuses[$i]->id}}">{{$statuses[$i]->nome}}</option>
						@endfor
					@endif

			    </select>
			</div>
		</div>



		<div class="col-md-12" style="text-align:right">
			<button type="submit" class="btn btn-success" id="salvar-tarefa" style="float-right">Salvar</button>
		</div>

		<div class="modal-footer"></div>
	</div>
</form>
<script type="text/javascript"  src="{{asset('js/jquery.min.js')}}" ></script>
<script>
	$(document).ready(function() {
		$('#salvar-tarefa').click(function() {
			
			if ($('#nome').val() == '') {
				modalValidacao("O campo Nome é obrigatório!"); 
				return false;
			}  else if ($('#status_id').val() == '') {
				modalValidacao("O campo Segmento é obrigatório!"); 
				return false;
			} else {
				return true;
			}

		});
	});
</script>
