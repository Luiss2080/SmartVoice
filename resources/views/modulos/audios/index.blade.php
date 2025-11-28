@extends('layouts.app')

@section('title', 'Audios - SmartVoice')
@section('header', 'Audios')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Biblioteca de Audios</h3>
        <button class="btn btn-primary" style="width: auto;">
            <i class="fa-solid fa-cloud-arrow-up"></i> Subir Audio
        </button>
    </div>
    <div class="card-body">
        @if($audios->isEmpty())
            <div style="padding: 40px; text-align: center; color: var(--text-light);">
                <i class="fa-solid fa-music" style="font-size: 3rem; margin-bottom: 20px; opacity: 0.5;"></i>
                <p>No hay audios subidos aún.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table" style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 2px solid #f0f0f0;">
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Nombre</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Campaña</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Duración</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600;">Formato</th>
                            <th style="padding: 15px; color: var(--text-light); font-weight: 600; text-align: right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($audios as $audio)
                        <tr style="border-bottom: 1px solid #f0f0f0;">
                            <td style="padding: 15px;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <div style="width: 32px; height: 32px; background: #eef0ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--primary-color);">
                                        <i class="fa-solid fa-play" style="font-size: 0.8rem;"></i>
                                    </div>
                                    <span style="font-weight: 500;">{{ $audio->nombre }}</span>
                                </div>
                            </td>
                            <td style="padding: 15px;">
                                {{ $audio->campana->nombre ?? 'Sin Campaña' }}
                            </td>
                            <td style="padding: 15px; font-family: monospace;">
                                {{ $audio->duracion ?? '--:--' }}
                            </td>
                            <td style="padding: 15px;">
                                <span style="background: #f0f0f0; padding: 2px 6px; border-radius: 4px; font-size: 0.8rem; font-weight: 600; color: #666;">
                                    {{ strtoupper($audio->formato ?? 'MP3') }}
                                </span>
                            </td>
                            <td style="padding: 15px; text-align: right;">
                                <button style="background: none; border: none; color: var(--primary-color); cursor: pointer; margin-right: 10px;">
                                    <i class="fa-solid fa-download"></i>
                                </button>
                                <button style="background: none; border: none; color: var(--accent-color); cursor: pointer;">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection
