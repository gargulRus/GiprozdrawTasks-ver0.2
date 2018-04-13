<!-- МОДАЛЬНЫЙ ОКНА С ВЕДОМОСТЯМИ ОБЪЕМОВ ВМЕСТО СПЕЦИФИКАЦИЙ ДЛЯ СТАДИИ Р  -->
<!-- Модальное окно изменения прогресса выполнения -->
<div id="updatetaskgpr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу пустое</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformgpr">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidgpr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidgpr">
                     <input name='pos' type='hidden' value="" id="tsposgpr">         
                     <input name='progress' type='hidden' value="" id="tsproggpr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskpzgpr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpzgpr">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzgpr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzgpr">
                     <input name='pos' type='hidden' value="" id="tspospzgpr">         
                     <input name='progress' type='hidden' value="" id="tsprogpzgpr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskpzghgpr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpzghgpr">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzghgpr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzghgpr">
                     <input name='pos' type='hidden' value="" id="tspospzghgpr">         
                     <input name='progress' type='hidden' value="" id="tsprogpzghgpr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskpzspgpr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpzspgpr">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzspgpr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzspgpr">
                     <input name='pos' type='hidden' value="" id="tspospzspgpr">         
                     <input name='progress' type='hidden' value="" id="tsprogpzspgpr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskpzghspgpr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpzghspgpr">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzghspgpr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzghspgpr">
                     <input name='pos' type='hidden' value="" id="tspospzghspgpr">         
                     <input name='progress' type='hidden' value="" id="tsprogpzghspgpr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskghspgpr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformghspgpr">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidghspgpr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidghspgpr">
                     <input name='pos' type='hidden' value="" id="tsposghspgpr">         
                     <input name='progress' type='hidden' value="" id="tsprogghspgpr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskghgpr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformghgpr">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidghgpr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidghgpr">
                     <input name='pos' type='hidden' value="" id="tsposghgpr">         
                     <input name='progress' type='hidden' value="" id="tsprogghgpr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskspgpr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformspgpr">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidspgpr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidspgpr">
                     <input name='pos' type='hidden' value="" id="tsposspgpr">         
                     <input name='progress' type='hidden' value="" id="tsprogspgpr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- МОДАЛЬНЫЙ ОКНА СМЕТ ДЛЯ СТАДИИ Р  -->
<!-- Модальное окно изменения прогресса выполнения -->
<div id="updatetasksmr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу пустое</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformsmr">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidsmr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidsmr">
                     <input name='pos' type='hidden' value="" id="tspossmr">         
                     <input name='progress' type='hidden' value="" id="tsprogsmr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskpzsmr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpzsmr">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzsmr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzsmr">
                     <input name='pos' type='hidden' value="" id="tspospzsmr">         
                     <input name='progress' type='hidden' value="" id="tsprogpzsmr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskpzghsmr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpzghsmr">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzghsmr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzghsmr">
                     <input name='pos' type='hidden' value="" id="tspospzghsmr">         
                     <input name='progress' type='hidden' value="" id="tsprogpzghsmr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskpzspsmr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpzspsmr">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzspsmr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzspsmr">
                     <input name='pos' type='hidden' value="" id="tspospzspsmr">         
                     <input name='progress' type='hidden' value="" id="tsprogpzspsmr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskpzghspsmr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformpzghspsmr">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzghspsmr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzghspsmr">
                     <input name='pos' type='hidden' value="" id="tspospzghspsmr">         
                     <input name='progress' type='hidden' value="" id="tsprogpzghspsmr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskghspsmr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformghspsmr">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidghspsmr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidghspsmr">
                     <input name='pos' type='hidden' value="" id="tsposghspsmr">         
                     <input name='progress' type='hidden' value="" id="tsprogghspsmr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskghsmr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformghsmr">
                    <div class="form-group">
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox" name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidghsmr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidghsmr">
                     <input name='pos' type='hidden' value="" id="tsposghsmr">         
                     <input name='progress' type='hidden' value="" id="tsprogghsmr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<div id="updatetaskspsmr" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetaskR" id="updatetaskformspsmr">
                    <div class="form-group">
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidspsmr">
                     <input name='object-id' type='hidden' value="" id="tsobjectidspsmr">
                     <input name='pos' type='hidden' value="" id="tsposspsmr">         
                     <input name='progress' type='hidden' value="" id="tsprogspsmr">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>


<script type="text/javascript">
$( document ).ready(function() {
    //СКРИПТЫ ДЛЯ МОДАЛЬНЫХ ОКОН В СТАДИИ Р ДЛЯ ВЕДОМОСТЕЙ
           // скрипт для модального окна переименования задачи
           $('.openformtaskgpr').click(function(){
        $('#tsproggpr').val( $(this).attr('data-progress'));
        $('#tsidgpr').val( $(this).attr('data-id') );
        $('#tsposgpr').val( $(this).attr('data-pos') );
        $('#tsobjectidgpr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformgpr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformgpr').html( data );
            });
        return false;
    });
           // скрипт для модального окна pz
           $('.openformtaskpzgpr').click(function(){
        $('#tsprogpzgpr').val( $(this).attr('data-progress'));
        $('#tsidpzgpr').val( $(this).attr('data-id') );
        $('#tspospzgpr').val( $(this).attr('data-pos') );
        $('#tsobjectidpzgpr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzgpr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzgpr').html( data );
            });
        return false;
    });
               // скрипт для модального окна pzgh
               $('.openformtaskpzghgpr').click(function(){
        $('#tsprogpzghgpr').val( $(this).attr('data-progress'));
        $('#tsidpzghgpr').val( $(this).attr('data-id') );
        $('#tspospzghgpr').val( $(this).attr('data-pos') );
        $('#tsobjectidpzghgpr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzghgpr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzghgpr').html( data );
            });
        return false;
    });

                   // скрипт для модального окна pzsp
                   $('.openformtaskpzspgpr').click(function(){
        $('#tsprogpzspgpr').val( $(this).attr('data-progress'));
        $('#tsidpzspgpr').val( $(this).attr('data-id') );
        $('#tspospzspgpr').val( $(this).attr('data-pos') );
        $('#tsobjectidpzspgpr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzspgpr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzspgpr').html( data );
            });
        return false;
    });
               // скрипт для модального окна pzghsp
        $('.openformtaskpzghspgpr').click(function(){
        $('#tsprogpzghspgpr').val( $(this).attr('data-progress'));
        $('#tsidpzghspgpr').val( $(this).attr('data-id') );
        $('#tspospzghspgpr').val( $(this).attr('data-pos') );
        $('#tsobjectidpzghspgpr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzghspgpr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzghspgpr').html( data );
            });
        return false;
    });

        // скрипт для модального окна ghsp
        $('.openformtaskghspgpr').click(function(){
        $('#tsprogghspgpr').val( $(this).attr('data-progress'));
        $('#tsidghspgpr').val( $(this).attr('data-id') );
        $('#tsposghspgpr').val( $(this).attr('data-pos') );
        $('#tsobjectidghspgpr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformghspgpr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformghspgpr').html( data );
            });
        return false;
    });

        // скрипт для модального окна gh
        $('.openformtaskghgpr').click(function(){
        $('#tsprogghgpr').val( $(this).attr('data-progress'));
        $('#tsidghgpr').val( $(this).attr('data-id') );
        $('#tsposghgpr').val( $(this).attr('data-pos') );
        $('#tsobjectidghgpr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformghgpr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformghgpr').html( data );
            });
        return false;
    });

        // скрипт для модального окна sp
        $('.openformtaskspgpr').click(function(){
        $('#tsprogspgpr').val( $(this).attr('data-progress'));
        $('#tsidspgpr').val( $(this).attr('data-id') );
        $('#tsposspgpr').val( $(this).attr('data-pos') );
        $('#tsobjectidspgpr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformspgpr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformspgpr').html( data );
            });
        return false;
    });


        //СКРИПТЫ ДЛЯ МОДАЛЬНЫХ ОКОН В СТАДИИ Р ДЛЯ СМЕТ
           // скрипт для модального окна переименования задачи
           $('.openformtasksmr').click(function(){
        $('#tsprogsmr').val( $(this).attr('data-progress'));
        $('#tsidsmr').val( $(this).attr('data-id') );
        $('#tspossmr').val( $(this).attr('data-pos') );
        $('#tsobjectidsmr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformsmr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformsmr').html( data );
            });
        return false;
    });
           // скрипт для модального окна pz
           $('.openformtaskpzsmr').click(function(){
        $('#tsprogpzsmr').val( $(this).attr('data-progress'));
        $('#tsidpzsmr').val( $(this).attr('data-id') );
        $('#tspospzsmr').val( $(this).attr('data-pos') );
        $('#tsobjectidpzsmr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzsmr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzsmr').html( data );
            });
        return false;
    });
               // скрипт для модального окна pzgh
               $('.openformtaskpzghsmr').click(function(){
        $('#tsprogpzghsmr').val( $(this).attr('data-progress'));
        $('#tsidpzghsmr').val( $(this).attr('data-id') );
        $('#tspospzghsmr').val( $(this).attr('data-pos') );
        $('#tsobjectidpzghsmr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzghsmr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzghsmr').html( data );
            });
        return false;
    });

                   // скрипт для модального окна pzsp
                   $('.openformtaskpzspsmr').click(function(){
        $('#tsprogpzspsmr').val( $(this).attr('data-progress'));
        $('#tsidpzspsmr').val( $(this).attr('data-id') );
        $('#tspospzspsmr').val( $(this).attr('data-pos') );
        $('#tsobjectidpzspsmr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzspsmr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzspsmr').html( data );
            });
        return false;
    });
               // скрипт для модального окна pzghsp
        $('.openformtaskpzghspsmr').click(function(){
        $('#tsprogpzghspsmr').val( $(this).attr('data-progress'));
        $('#tsidpzghspsmr').val( $(this).attr('data-id') );
        $('#tspospzghspsmr').val( $(this).attr('data-pos') );
        $('#tsobjectidpzghspsmr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzghspsmr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzghspsmr').html( data );
            });
        return false;
    });

        // скрипт для модального окна ghsp
        $('.openformtaskghspsmr').click(function(){
        $('#tsprogghspsmr').val( $(this).attr('data-progress'));
        $('#tsidghspsmr').val( $(this).attr('data-id') );
        $('#tsposghspsmr').val( $(this).attr('data-pos') );
        $('#tsobjectidghspsmr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformghspsmr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformghspsmr').html( data );
            });
        return false;
    });

        // скрипт для модального окна gh
        $('.openformtaskghsmr').click(function(){
        $('#tsprogghsmr').val( $(this).attr('data-progress'));
        $('#tsidghsmr').val( $(this).attr('data-id') );
        $('#tsposghsmr').val( $(this).attr('data-pos') );
        $('#tsobjectidghsmr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformghsmr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformghsmr').html( data );
            });
        return false;
    });

        // скрипт для модального окна sp
        $('.openformtaskspsmr').click(function(){
        $('#tsprogspsmr').val( $(this).attr('data-progress'));
        $('#tsidspsmr').val( $(this).attr('data-id') );
        $('#tsposspgpr').val( $(this).attr('data-pos') );
        $('#tsobjectidspsmr').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformspsmr').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformspsmr').html( data );
            });
        return false;
    });
     
});
</script>