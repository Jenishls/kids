<div id="kanban1">
    <div class="kanban-container sortable" style="width: 750px;"> 
        @if(count($taskboard->taskboardList)>0)
            @foreach($taskboard->taskboardList as $boardList)
                <div id="board_list_{{$boardList->id}}" data-id="{{$boardList->id}}" class="kanban-board" style="width: 250px; margin-left: 0px; margin-right: 0px;">
                    <header class="kanban-board-header">
                        <div class="kanban-title-board">{{$boardList->title}}</div>
                        <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="flaticon-more-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" style="position: absolute; transform: translate3d(-143px, -218px, 0px); top: 0px; left: 0px; will-change: transform;" x-placement="top-end">
                                <ul class="kt-nav">
                                    <li class="kt-nav__item">
                                        <a href="javascript:void(0)" class="kt-nav__link openModel" data-url="/admin/taskboardlist/edit/{{$boardList->id}}">
                                            <i class="kt-nav__link-icon flaticon-edit-1"></i>
                                            <span class="kt-nav__link-text">Update List</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="javascript:void(0)" class="kt-nav__link openModel" data-url="/admin/taskboardlist/delete/{{$boardList->id}}">
                                            <i class="kt-nav__link-icon flaticon-delete-1"></i>
                                            <span class="kt-nav__link-text">Archive List</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="javascript:void(0)" class="kt-nav__link btnTaskboardCardNew" data-id="{{$boardList->id}}">
                                            <i class="kt-nav__link-icon flaticon2-add-1"></i>
                                            <span class="kt-nav__link-text">Add Card</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="javascript:void(0)" class="kt-nav__link openModel" data-url="/admin/taskboardlist/edit/{{$boardList->id}}">
                                            <i class="kt-nav__link-icon flaticon2-pen"></i>
                                            <span class="kt-nav__link-text">Update Status</span>
                                        </a>
                                    </li>
                                </ul>						
                            </div>
                        </div>
                    </header>
                    
                    <div class="kanban-status-container">
                        @if(isset($boardList->status)) 
                        <span class="kanban-status"
                            style="background:{{$boardList->status->description ?? '#b9b9b9'}}">{{$boardList->status->value}}
                        </span>
                        @endif 
                    </div>
                    <main class="kanban-drag">
                        @if(count($boardList->cards)>0)
                            @foreach($boardList->cards as $card)
                                <div class="kanban-item card-items openModel" data-parent="{{$boardList->id}}" data-id="{{$card->id}}" data-url="/taskboardcard/update/{{$card->id}}">
                                    <div class="kanban-item-title">
                                        <span>{{$card->title}}</span>
                                    </div>
                                    <div class="m-t-10 kanban-item-info">
                                        <div>
                                            <span class="kanban-badge-status" style="background:{{$boardList->status->description??'#b9b9b9'}}">{{$boardList->status->value??"No Status"}}</span>
                                        </div>
                                        @if(isset($card->due_date))
                                        <div>
                                            <span class="kanban-item-due-date">Due date - {{bladeDate($card->due_date)}}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            <a class="kanban-btn-new-card" id="addCard{{$boardList->id}}" href="javascript:void(0)">Add Card...</a>
                            <div class="kanban-item" style="display:none">
                                <form class="cardCreateForm">
                                    @csrf
                                    <input type="hidden" name="taskboard_list_id" value="{{$boardList->id}}">
                                    <textarea placeholder="Enter a title for this card..." 
                                        class="form-control mb-10"
                                        style="height: 60px;
                                        margin-top: 0px;
                                        margin-bottom: 10px;
                                        resize: none;
                                        min-height: 60px;
                                        overflow-y: hidden;" 
                                        oninput="auto_grow(this)" 
                                        name="title"></textarea>
                                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                                        <button type="button" class="btn btn-default btn-sm hideForm">cancel</button>
                                </form>
                            </div>
                        @else 
                            <a class="kanban-btn-new-card" id="addCard{{$boardList->id}}" href="javascript:void(0)">Add Card...</a>
                            <div class="kanban-item" style="display:none">
                                <form class="cardCreateForm">
                                    @csrf
                                    <input type="hidden" name="taskboard_list_id" value="{{$boardList->id}}">
                                    <textarea placeholder="Enter a title for this card..." 
                                        class="form-control mb-10 cardTextarea"
                                        style="height: 60px;
                                        margin-top: 0px;
                                        margin-bottom: 10px;
                                        resize: none;
                                        min-height: 60px;
                                        overflow-y: hidden;" 
                                        oninput="auto_grow(this)" 
                                        name="title"></textarea>
                                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                                        <button type="button" class="btn btn-default btn-sm hideForm">cancel</button>
                                </form>
                            </div>
                        @endif

                    </main>
                    <footer></footer>
                </div> 
            @endforeach 
        @else 
            <p>No List Create now</p> 
        @endif
    </div>
</div>
