<div class="panel panel-default">
    <div class="panel-body">
        <form class="form" method="POST" action="{{ route('user.ficha.create')}}">
            @csrf
     
            <section>
                <legend>Autor Principal</legend>
                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label>
            	            Nome
            		        <span class="required-indicator">*</span>
            	        </label>
                        <input name="autor_nome" type="text" class="form-control" id="" placeholder="Ex. Tarsila de Aguiar do" value="">
                    </div>
                
                    <div class="form-group col-md-6">
            	        <label>
            		        Sobrenome
            		    <span class="required-indicator">*</span>
            	        </label>
                        <input name="autor_sobrenome" type="text" class="form-control" id="" placeholder="Ex. Amaral" value="">
                    </div>
                </div>
            </section>

            <section>
                <legend>Outros Autores</legend>
                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label> Nome Autor 1 </label>
                        <input name="autor1_nome" type="text" class="form-control" id="" placeholder="Ex. Anita Catarina Malfatti" value="">
                    </div>
                
                    <div class="form-group col-md-6">
                        <label> Nome Autor 2 </label>
                        <input name="autor2_nome" type="text" class="form-control" id="" placeholder="Ex. Inácio da Costa Ferreira" value="">
                    </div>
                </div>
            </section>

            <section>
                <legend>Informações do Trabalho</legend>
                    <div class="form-group col-md-12" >
                            <label>
                                Título 
                                <span class="required-indicator">*</span>
                            </label>
                            <input name="titulo" type="text" class="form-control" id="" placeholder="Digite o Título do Trabalho" value="">
                    </div>
                
                    <div class="form-group col-md-12">
                            <label> Subtítulo </label>
                            <input name="subtitulo" type="text" class="form-control" id="" placeholder="Digite o Subtítulo do Trabalho" value="">
                    </div>

                <div class="form-row">
                     <div class="form-group col-md-4" >
                        <label> Universidade </label>
                        <input name="universidade" type="text" class="form-control" id="" placeholder="Ex. Universidade Estadual do Maranhão" value="">
                    </div>

                    <div class="form-group col-md-4" >
                        <label> Cidade </label>
                        <input name="cidade" type="text" class="form-control" id="" placeholder="Ex. São Luís" value="">
                    </div>
                
                    <div class="form-group col-md-4">
                        <label> Ano </label>
                        <input name="ano" type="text" class="form-control" id="" placeholder="Ex. 2019" value="">
                    </div>
                </div>
            </section>

            <section>
                <legend>Nível</legend>

                <div class="form-row">
                    <div class="form-group col-md-6" >
                        <label> 
                            Trabalho 
                            <span class="required-indicator">*</span>
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nivel_trabalho" value="tcc" />
                            <label class="form-check-label">
                                TCC Graduação
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nivel_trabalho" value="lato_sensu" />
                            <label class="form-check-label">
                                Pós-Graduação (Lato Sensu)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="nivel_trabalho" value="stricto_sensu" />
                            <label class="form-check-label">
                                Pós-Graduação (Stricto Sensu)
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6" >
                        <label> 
                            Departamento 
                            <span class="required-indicator">*</span>
                        </label>
                        <input name="departamento" type="text" class="form-control" id="" placeholder="Digite o Departamento do seu curso" value="">
                         <label> 
                            Curso 
                            <span class="required-indicator">*</span>
                        </label>
                        <input name="curso" type="text" class="form-control" id="" placeholder="Ex. Engenharia de Computação" value="">
                    </div>
                </div>
            </section>

            <section>
                <legend>Orientador(a)</legend>
                <div class="form-row">
                    <div class="form-group col-md-6" >
                            <label>
                                Nome 
                                <span class="required-indicator">*</span>
                            </label>
                            <input name="orientador_nome" type="text" class="form-control" id="" placeholder="Ex. Prof. Dr. Diógenes Carvalho" value="">
                    </div>
                
                    <div class="form-group col-md-6">
                            <label> 
                                Sobrenome 
                                <span class="required-indicator">*</span>
                            </label>
                            <input name="orientador_sobrenome" type="text" class="form-control" id="" placeholder="Ex. Aquino" value="">
                    </div>
                </div>
            </section>

            <section>
                <legend>Coorientador(a)</legend>
                <div class="form-row">
                    <div class="form-group col-md-6" >
                            <label>
                                Nome 
                            </label>
                            <input name="coorientador_nome" type="text" class="form-control" id="" placeholder="Ex. Prof. Dr. Diógenes Carvalho" value="">
                    </div>
                
                    <div class="form-group col-md-6">
                            <label> 
                                Sobrenome 
                            </label>
                            <input name="coorientador_sobrenome" type="text" class="form-control" id="" placeholder="Ex. Aquino" value="">
                    </div>
                </div>
            </section>

             <section>
                <legend>Assuntos do Trabalho</legend>
                <div class="form-row">
                    <div class="form-group col-md-6" >
                            <label>
                                Assunto 1 
                                 <span class="required-indicator">*</span>
                            </label>
                            <input name="assunto1" type="text" class="form-control" id="" value="">
                    </div>
                
                    <div class="form-group col-md-6">
                            <label> 
                                Assunto 2 
                                <span class="required-indicator">*</span>
                            </label>
                            <input name="assunto2" type="text" class="form-control" id="" value="">
                    </div>

                    <div class="form-group col-md-6">
                            <label> 
                                Assunto 3
                                <span class="required-indicator">*</span>
                            </label>
                            <input name="assunto3" type="text" class="form-control" id=""  value="">
                    </div>

                    <div class="form-group col-md-6">
                            <label> 
                                Assunto 4
                            </label>
                            <input name="assunto4" type="text" class="form-control" id=""value="">
                    </div>

                    <div class="form-group col-md-6">
                            <label> 
                                Assunto 5
                            </label>
                            <input name="assunto5" type="text" class="form-control" id=""  value="">
                    </div>
                </div>
            </section>

            <div class="form-group" >
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit"> Enviar </button>
                </div>
            </div>

        </form>
    </div>
</div>