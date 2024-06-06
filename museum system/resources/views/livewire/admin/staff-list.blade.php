

<div class="wrapper">

    <livewire:list-top title="Працівники" button="Зареєструвати працівника"/>

    <section class="datatable">
        <livewire:admin.staff-table />
    </section>


    <div class="modal fade addStaff" wire:ignore.self id="addStaff" tabindex="-1" aria-labelledby="editRecord" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Зареєструвати працівника</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">ПІБ</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Уведіть ПІБ працівника"/>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Роль</label>
                        <select class="form-select" id="role" aria-label="role">
                            <option value="accountant">Обліковець</option>
                            <option value="employee">Науковий співробітник</option>
                            <option value="director">Директор</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Музей</label>
                        <select class="form-select" id="role" aria-label="role" style="width:100%">
                            @foreach($museums as $item)
                            <option value="{{$item->museum_id}}">{{$item->museum_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Уведіть Email працівника"/>
                    </div>
                    <button class="link-form generate" id="generate">Згенерувати логін та пароль користувача</button>
                    <div class="success">
                        <img src="/img/success.svg" alt="success">
                        <p>Ім’я користувача та пароль були успішно згенеровані. Після реєстрації логін та пароль
                            будуть відправлені на пошту створеному користувачу.</p>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                    <button type="button" class="btn-main">Зареєструвати</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade editStaff" wire:ignore.self id="editStaff" tabindex="-1" aria-labelledby="editRecord" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Редагувати інформацію</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label for="fullname" class="form-label">ПІБ</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Уведіть ПІБ працівника"/>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Роль</label>
                        <select class="form-select" id="role" aria-label="role">
                            <option value="accountant">Обліковець</option>
                            <option value="employee">Науковий співробітник</option>
                            <option value="director">Директор</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Музей</label>
                        <select class="form-select" id="role" aria-label="role" style="width:100%">
                            @foreach($museums as $item)
                            <option value="{{$item->museum_id}}">{{$item->museum_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Уведіть Email працівника"/>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                    <button type="button" class="btn-main">Зареєструвати</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deactivateUser" tabindex="-1" aria-labelledby="deactivateUser" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Попередження</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <p>Увага! Після деактивації користувача, він більше не буде мати доступу до системи.</p>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn-tertiary" data-bs-dismiss="modal">Скасувати</button>
                    <button type="button" class="btn-main">Деактивувати</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    window.addEventListener('openAddModal', function() {
        $('.addStaff').find('span').html('');
        $('.addStaff').find('form')[0].reset();
        $('.addStaff').modal('show');
    });
    window.addEventListener('closeAddModal', function() {
        $('.addStaff').find('span').html('');
        $('.addStaff').find('form')[0].reset();
        $('.addStaff').modal('hide');
    });
    window.addEventListener('openEditModal', function(event) {
        $('.editStaff').modal('show');
    });
    window.addEventListener('closeEditModal', function() {
        $('.editStaff').find('span').html('');
        $('.editStaff').find('form')[0].reset();
        $('.editStaff').modal('hide');
    });
</script>
