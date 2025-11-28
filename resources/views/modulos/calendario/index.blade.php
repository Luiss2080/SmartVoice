@extends('layouts.app')

@section('title', 'Calendario - SmartVoice')
@section('header', 'Calendario de Eventos')

@section('content')
<div class="card">
    <div class="card-body" style="padding: 20px;">
        <div class="calendar-header">
            <div class="calendar-controls">
                <button id="prevMonth" class="btn-icon"><i class="fa-solid fa-chevron-left"></i></button>
                <h2 id="currentMonthYear" class="calendar-title"></h2>
                <button id="nextMonth" class="btn-icon"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
            <button id="todayBtn" class="btn btn-secondary">Hoy</button>
        </div>

        <div class="calendar-grid-header">
            <div>Dom</div>
            <div>Lun</div>
            <div>Mar</div>
            <div>Mié</div>
            <div>Jue</div>
            <div>Vie</div>
            <div>Sáb</div>
        </div>
        <div id="calendarGrid" class="calendar-grid">
            <!-- Days will be rendered here by JS -->
        </div>
    </div>
</div>

<!-- Event Modal -->
<div id="eventModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Nuevo Evento</h3>
            <span class="close-modal">&times;</span>
        </div>
        <div class="modal-body">
            <form id="eventForm">
                @csrf
                <div class="form-group">
                    <label for="eventTitle">Título</label>
                    <input type="text" id="eventTitle" name="titulo" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="eventDesc">Descripción</label>
                    <textarea id="eventDesc" name="descripcion" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="eventStart">Inicio</label>
                        <input type="datetime-local" id="eventStart" name="fecha_inicio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="eventEnd">Fin</label>
                        <input type="datetime-local" id="eventEnd" name="fecha_fin" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Color</label>
                    <div class="color-picker">
                        <div class="color-option selected" data-color="#5d5fef" style="background: #5d5fef;"></div>
                        <div class="color-option" data-color="#ff6b6b" style="background: #ff6b6b;"></div>
                        <div class="color-option" data-color="#2ecc71" style="background: #2ecc71;"></div>
                        <div class="color-option" data-color="#f1c40f" style="background: #f1c40f;"></div>
                        <div class="color-option" data-color="#9b59b6" style="background: #9b59b6;"></div>
                    </div>
                    <input type="hidden" id="eventColor" name="color" value="#5d5fef">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-modal-btn">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/calendar.js') }}"></script>
@endsection
