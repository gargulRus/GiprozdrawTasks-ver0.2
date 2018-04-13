<!-- МОДАЛЬНЫЙ ОКНА С ВЕДОМОСТЯМИ ОБЪЕМОВ ВМЕСТО СПЕЦИФИКАЦИЙ ДЛЯ СТАДИИ П  -->
<!-- Модальное окно изменения прогресса выполнения -->
<div id="updatetaskgp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу пустое</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformgp">
                    <div class="form-group">
                    <input type="checkbox"  name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidgp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidgp">
                     <input name='pos' type='hidden' value="" id="tsposgp">         
                     <input name='progress' type='hidden' value="" id="tsproggp">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс ПЗ-не активен-->
<div id="updatetaskpzgp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformpzgp">
                    <div class="form-group">
                    <input type="checkbox"  disabled name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzgp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzgp">
                     <input name='pos' type='hidden' value="" id="tspospzgp">         
                     <input name='progress' type='hidden' value="" id="tsprogpzgp">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс ПЗ и ГЧ -не активны -->
<div id="updatetaskpzghgp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformpzghgp">
                    <div class="form-group">
                    <input type="checkbox"  disabled name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzghgp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzghgp">
                     <input name='pos' type='hidden' value="" id="tspospzghgp">         
                     <input name='progress' type='hidden' value="" id="tsprogpzghgp">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс ПЗ и СП -не активны -->
<div id="updatetaskpzspgp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformpzspgp">
                    <div class="form-group">
                    <input type="checkbox"  disabled name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzspgp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzspgp">
                     <input name='pos' type='hidden' value="" id="tspospzspgp">         
                     <input name='progress' type='hidden' value="" id="tsprogpzspgp">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения ВСЕ чекбоксы не активны -->
<div id="updatetaskpzghspgp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformpzghspgp">
                    <div class="form-group">
                    <input type="checkbox"  disabled name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzghspgp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzghspgp">
                     <input name='pos' type='hidden' value="" id="tspospzghspgp">         
                     <input name='progress' type='hidden' value="" id="tsprogpzghspgp">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс ГЧ и СП -не активны -->
<div id="updatetaskghspgp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformghspgp">
                    <div class="form-group">
                    <input type="checkbox" name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidghspgp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidghspgp">
                     <input name='pos' type='hidden' value="" id="tsposghspgp">         
                     <input name='progress' type='hidden' value="" id="tsprogghspgp">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс ГЧ -не активен -->
<div id="updatetaskghgp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformghgp">
                    <div class="form-group">
                    <input type="checkbox"   name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidghgp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidghgp">
                     <input name='pos' type='hidden' value="" id="tsposghgp">         
                     <input name='progress' type='hidden' value="" id="tsprogghgp">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс СП -не активен -->
<div id="updatetaskspgp" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformspgp">
                    <div class="form-group">
                    <input type="checkbox"   name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Графическая часть</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Ведомость Объемов</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidspgp">
                     <input name='object-id' type='hidden' value="" id="tsobjectidspgp">
                     <input name='pos' type='hidden' value="" id="tsposspgp">         
                     <input name='progress' type='hidden' value="" id="tsprogspgp">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- МОДАЛЬНЫЕ ОКНА ДЛЯ СМЕТ СТАДИИ П  -->
<!-- Модальное окно изменения прогресса выполнения -->
<div id="updatetasksm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу пустое</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformsm">
                    <div class="form-group">
                    <input type="checkbox"  name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidsm">
                     <input name='object-id' type='hidden' value="" id="tsobjectidsm">
                     <input name='pos' type='hidden' value="" id="tspossm">         
                     <input name='progress' type='hidden' value="" id="tsprogsm">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс ПЗ-не активен-->
<div id="updatetaskpzsm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformpzsm">
                    <div class="form-group">
                    <input type="checkbox"  disabled name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzsm">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzsm">
                     <input name='pos' type='hidden' value="" id="tspospzsm">         
                     <input name='progress' type='hidden' value="" id="tsprogpzsm">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс ПЗ и ГЧ -не активны -->
<div id="updatetaskpzghsm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformpzghsm">
                    <div class="form-group">
                    <input type="checkbox"  disabled name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox"  name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzghsm">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzghsm">
                     <input name='pos' type='hidden' value="" id="tspospzghsm">         
                     <input name='progress' type='hidden' value="" id="tsprogpzghsm">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс ПЗ и СП -не активны -->
<div id="updatetaskpzspsm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformpzspsm">
                    <div class="form-group">
                    <input type="checkbox"  disabled name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzspsm">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzspsm">
                     <input name='pos' type='hidden' value="" id="tspospzspsm">         
                     <input name='progress' type='hidden' value="" id="tsprogpzspsm">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения ВСЕ чекбоксы не активны -->
<div id="updatetaskpzghspsm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformpzghspsm">
                    <div class="form-group">
                    <input type="checkbox"  disabled name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidpzghspsm">
                     <input name='object-id' type='hidden' value="" id="tsobjectidpzghspsm">
                     <input name='pos' type='hidden' value="" id="tspospzghspsm">         
                     <input name='progress' type='hidden' value="" id="tsprogpzghspsm">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс ГЧ и СП -не активны -->
<div id="updatetaskghspsm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformghspsm">
                    <div class="form-group">
                    <input type="checkbox" name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidghspsm">
                     <input name='object-id' type='hidden' value="" id="tsobjectidghspsm">
                     <input name='pos' type='hidden' value="" id="tsposghspsm">         
                     <input name='progress' type='hidden' value="" id="tsprogghspsm">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс ГЧ -не активен -->
<div id="updatetaskghsm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformghsm">
                    <div class="form-group">
                    <input type="checkbox"   name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox" disabled name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox" name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidghsm">
                     <input name='object-id' type='hidden' value="" id="tsobjectidghsm">
                     <input name='pos' type='hidden' value="" id="tsposghsm">         
                     <input name='progress' type='hidden' value="" id="tsprogghsm">    
                 <div class="form-group text-right">
                     <input type="submit" class="btn btn-success" value="Сохранить"/>
                   </div>
            </form>
        </div>
        </div>
    </div>
</div>
<!-- Модальное окно изменения прогресса выполнения чекбокс СП -не активен -->
<div id="updatetaskspsm" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button class="close" data-dismiss="modal">x</button>
            <h4 class="modal-title">Изменить задачу</h4>
            </div>
            <div class="modal-body">
                 <form method="POST" action="/?save=updatetask" id="updatetaskformspsm">
                    <div class="form-group">
                    <input type="checkbox"   name="pz" id="tspz" class="taskpz" value=1>
                     <label for="tspz">ПЗ</label>
                     <br>
                     <input type="checkbox"  name="graph" id="tsgraph" class="graphclass" value=1>
                     <label for="tsgraph">Сметы</label>
                     <br>
                     <input type="checkbox" disabled name="spec" id="tsspec" class="taskspec" value=1>
                     <label for="tsspec">Прайс-Листы</label>
                </div>
                <br>
                     <input name='id' type='hidden' value="" id="tsidspsm">
                     <input name='object-id' type='hidden' value="" id="tsobjectidspsm">
                     <input name='pos' type='hidden' value="" id="tsposspsm">         
                     <input name='progress' type='hidden' value="" id="tsprogspsm">    
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

       // скрипт для модального окна переименования задачи
    $('.openformtaskgp').click(function(){
        $('#tsproggp').val( $(this).attr('data-progress'));
        $('#tsidgp').val( $(this).attr('data-id') );
        $('#tsposgp').val( $(this).attr('data-pos') );
        $('#tsobjectidgp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformgp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformgp').html( data );
            });
        return false;
    });
    // скрипт для модального окна pz
    $('.openformtaskpzgp').click(function(){
        $('#tsprogpzgp').val( $(this).attr('data-progress'));
        $('#tsidpzgp').val( $(this).attr('data-id') );
        $('#tspospzgp').val( $(this).attr('data-pos') );
        $('#tsobjectidpzgp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzgp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzgp').html( data );
            });
        return false;
    });
               // скрипт для модального окна pzgh
               $('.openformtaskpzghgp').click(function(){
        $('#tsprogpzghgp').val( $(this).attr('data-progress'));
        $('#tsidpzghgp').val( $(this).attr('data-id') );
        $('#tspospzghgp').val( $(this).attr('data-pos') );
        $('#tsobjectidpzghgp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzghgp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzghgp').html( data );
            });
        return false;
    });

                   // скрипт для модального окна pzsp
                   $('.openformtaskpzspgp').click(function(){
        $('#tsprogpzspgp').val( $(this).attr('data-progress'));
        $('#tsidpzspgp').val( $(this).attr('data-id') );
        $('#tspospzspgp').val( $(this).attr('data-pos') );
        $('#tsobjectidpzspgp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzspgp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzspgp').html( data );
            });
        return false;
    });
               // скрипт для модального окна pzghsp
        $('.openformtaskpzghspgp').click(function(){
        $('#tsprogpzghspgp').val( $(this).attr('data-progress'));
        $('#tsidpzghspgp').val( $(this).attr('data-id') );
        $('#tspospzghspgp').val( $(this).attr('data-pos') );
        $('#tsobjectidpzghspgp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzghspgp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzghspgp').html( data );
            });
        return false;
    });
 

        // скрипт для модального окна ghsp
        $('.openformtaskghspgp').click(function(){
        $('#tsprogghspgp').val( $(this).attr('data-progress'));
        $('#tsidghspgp').val( $(this).attr('data-id') );
        $('#tsposghspgp').val( $(this).attr('data-pos') );
        $('#tsobjectidghspgp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformghspgp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformghspgp').html( data );
            });
        return false;
    });

        // скрипт для модального окна gh
        $('.openformtaskghgp').click(function(){
        $('#tsprogghgp').val( $(this).attr('data-progress'));
        $('#tsidghgp').val( $(this).attr('data-id') );
        $('#tsposghgp').val( $(this).attr('data-pos') );
        $('#tsobjectidghgp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformghgp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformghgp').html( data );
            });
        return false;
    });

        // скрипт для модального окна sp
        $('.openformtaskspgp').click(function(){
        $('#tsprogspgp').val( $(this).attr('data-progress'));
        $('#tsidspgp').val( $(this).attr('data-id') );
        $('#tsposspgp').val( $(this).attr('data-pos') );
        $('#tsobjectidspgp').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformspgp').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformspgp').html( data );
            });
        return false;
    });   

     //СКРИПТЫ ДЛЯ МОДАЛЬНЫХ ОКНО СМЕТ
            // скрипт для модального окна переименования задачи
    $('.openformtasksm').click(function(){
        $('#tsprogsm').val( $(this).attr('data-progress'));
        $('#tsidsm').val( $(this).attr('data-id') );
        $('#tspossm').val( $(this).attr('data-pos') );
        $('#tsobjectidsm').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformsm').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformsm').html( data );
            });
        return false;
    });
    // скрипт для модального окна pz
    $('.openformtaskpzsm').click(function(){
        $('#tsprogpzsm').val( $(this).attr('data-progress'));
        $('#tsidpzsm').val( $(this).attr('data-id') );
        $('#tspospzsm').val( $(this).attr('data-pos') );
        $('#tsobjectidpzsm').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzsm').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzsm').html( data );
            });
        return false;
    });
               // скрипт для модального окна pzgh
               $('.openformtaskpzghsm').click(function(){
        $('#tsprogpzghsm').val( $(this).attr('data-progress'));
        $('#tsidpzghsm').val( $(this).attr('data-id') );
        $('#tspospzghsm').val( $(this).attr('data-pos') );
        $('#tsobjectidpzghsm').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzghsm').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzghsm').html( data );
            });
        return false;
    });

                   // скрипт для модального окна pzsp
                   $('.openformtaskpzspsm').click(function(){
        $('#tsprogpzspsm').val( $(this).attr('data-progress'));
        $('#tsidpzspsm').val( $(this).attr('data-id') );
        $('#tspospzspsm').val( $(this).attr('data-pos') );
        $('#tsobjectidpzspsm').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzspsm').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzspsm').html( data );
            });
        return false;
    });
               // скрипт для модального окна pzghsp
        $('.openformtaskpzghspsm').click(function(){
        $('#tsprogpzghspsm').val( $(this).attr('data-progress'));
        $('#tsidpzghspsm').val( $(this).attr('data-id') );
        $('#tspospzghspsm').val( $(this).attr('data-pos') );
        $('#tsobjectidpzghspsm').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformpzghspsm').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformpzghspsm').html( data );
            });
        return false;
    });
 

        // скрипт для модального окна ghsp
        $('.openformtaskghspsm').click(function(){
        $('#tsprogghspsm').val( $(this).attr('data-progress'));
        $('#tsidghspsm').val( $(this).attr('data-id') );
        $('#tsposghspsm').val( $(this).attr('data-pos') );
        $('#tsobjectidghspsm').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformghspsm').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformghspsm').html( data );
            });
        return false;
    });

        // скрипт для модального окна gh
        $('.openformtaskghsm').click(function(){
        $('#tsprogghsm').val( $(this).attr('data-progress'));
        $('#tsidghsm').val( $(this).attr('data-id') );
        $('#tsposghsm').val( $(this).attr('data-pos') );
        $('#tsobjectidghsm').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformghsm').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformghsm').html( data );
            });
        return false;
    });

        // скрипт для модального окна sp
        $('.openformtaskspsm').click(function(){
        $('#tsprogspsm').val( $(this).attr('data-progress'));
        $('#tsidspsm').val( $(this).attr('data-id') );
        $('#tsposspsm').val( $(this).attr('data-pos') );
        $('#tsobjectidspsm').val( $(this).attr('data-object-id') );           
    });

        $('#updatetaskformspsm').submit(function(){
                $.post( $(this).attr('action'), $(this).serialize(), function( data ) {
              $('#updatetaskformspsm').html( data );
            });
        return false;
    });   
});
</script>