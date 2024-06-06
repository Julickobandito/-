<div class="wizard">
    <div class="wizard-step {{ ($book_type=='income') ? 'active':'' }}">
        <div class="step step">1</div>
        <p>Запис у книгу надходжень</p>
    </div>
    <div class="wizard-step {{ ($book_type=='inventory') ? 'active':'' }}">
        <div class="step">2</div>
        <p>Запис в інвентарну книгу</p>
    </div>
    <div class="wizard-step {{ ($book_type=='special') ? 'active':'' }}">
        <div class="step">3</div>
        <p>Запис у спеціальну інвентарну книгу</p>
    </div>
    @if ($stepCompleted)
    <div class="wizard-step complete">
        <img src="/img/Tick.svg" alt="tick">
        <p>Запис в інвентарну книгу</p>
    </div>
    @endif
</div>
