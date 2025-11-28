@extends('layouts.app')

@section('title', 'Dashboard - SmartVoice')
@section('header', 'Mis Cursos')

@section('content')
<div class="dashboard-grid">
    <!-- Card 1: Operating System -->
    <div class="card card-purple" style="grid-column: span 2;">
        <div class="card-body" style="display: flex; align-items: center; justify-content: space-between;">
            <div style="flex: 1;">
                <h3 class="card-title" style="margin-bottom: 10px;">Operating System</h3>
                <p style="color: var(--text-light); margin-bottom: 20px;">Learn the basic operating system abstractions, mechanisms, and their implementations.</p>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="font-size: 0.8rem; color: var(--text-light);">Created by Mark Lee</span>
                </div>
            </div>
            <a href="#" class="btn-icon">
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>
    </div>

    <!-- Calendar / Date Widget -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nov 2025</h3>
            <div style="display: flex; gap: 10px;">
                <i class="fa-solid fa-chevron-left" style="cursor: pointer; color: var(--text-light);"></i>
                <i class="fa-solid fa-chevron-right" style="cursor: pointer; color: var(--text-light);"></i>
            </div>
        </div>
        <div class="card-body">
            <!-- Simple Calendar Placeholder -->
            <div style="display: grid; grid-template-columns: repeat(7, 1fr); text-align: center; gap: 10px; font-size: 0.9rem;">
                <span style="color: var(--text-light);">Mon</span>
                <span style="color: var(--text-light);">Tue</span>
                <span style="color: var(--text-light);">Wed</span>
                <span style="color: var(--text-light);">Thu</span>
                <span style="color: var(--text-light);">Fri</span>
                <span style="color: var(--text-light);">Sat</span>
                <span style="color: var(--text-light);">Sun</span>
                
                <span>1</span><span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span>
                <span>8</span><span style="background: var(--primary-dark); color: white; border-radius: 50%; width: 24px; height: 24px; display: inline-flex; align-items: center; justify-content: center; margin: 0 auto;">9</span><span>10</span><span>11</span><span>12</span><span style="background: var(--primary-dark); color: white; border-radius: 50%; width: 24px; height: 24px; display: inline-flex; align-items: center; justify-content: center; margin: 0 auto;">13</span><span>14</span>
            </div>
        </div>
    </div>

    <!-- Card 2: AI -->
    <div class="card card-purple" style="grid-column: span 2;">
        <div class="card-body" style="display: flex; align-items: center; justify-content: space-between;">
            <div style="flex: 1;">
                <h3 class="card-title" style="margin-bottom: 10px;">Artificial Intelligence</h3>
                <p style="color: var(--text-light); margin-bottom: 20px;">Intelligence demonstrated by machines, unlike the natural intelligence displayed by humans.</p>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="font-size: 0.8rem; color: var(--text-light);">Created by Jung Jaehyun</span>
                </div>
            </div>
            <a href="#" class="btn-icon">
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>
    </div>

    <!-- Online Users -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Online Users</h3>
            <a href="#" style="font-size: 0.8rem; color: var(--primary-color); text-decoration: none;">See all</a>
        </div>
        <div class="card-body">
            <div style="display: flex; flex-direction: column; gap: 15px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="user-avatar" style="width: 35px; height: 35px; font-size: 0.8rem;">M</div>
                    <div>
                        <div style="font-weight: 600; font-size: 0.9rem;">Maren Maureen</div>
                        <div style="font-size: 0.7rem; color: var(--text-light);">Student</div>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div class="user-avatar" style="width: 35px; height: 35px; font-size: 0.8rem; background: #FFD166; color: #333;">J</div>
                    <div>
                        <div style="font-weight: 600; font-size: 0.9rem;">Jennifer Jane</div>
                        <div style="font-size: 0.7rem; color: var(--text-light);">Student</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3: Software Engineering -->
    <div class="card card-purple" style="grid-column: span 2;">
        <div class="card-body" style="display: flex; align-items: center; justify-content: space-between;">
            <div style="flex: 1;">
                <h3 class="card-title" style="margin-bottom: 10px;">Software Engineering</h3>
                <p style="color: var(--text-light); margin-bottom: 20px;">Learn detailed of engineering to the design, development and maintenance of software.</p>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span style="font-size: 0.8rem; color: var(--text-light);">Created by Kim Taeyeong</span>
                </div>
            </div>
            <a href="#" class="btn-icon">
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection
