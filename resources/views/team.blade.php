@extends('layouts.app')

@section('content')
    <div class="responsive-container-block outer-container">
        <div class="responsive-container-block inner-container">
            <p class="text-blk section-head-text">
                Our Team
            </p>
            <p class="text-blk section-subhead-text">
                Team Members
            </p>
            <div class="responsive-container-block">
                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 team-card-container">
                    <div class="team-card">
                        <div class="img-wrapper">
                            <img class="team-img" src="{{ asset('images/isep.jpg') }}" alt="anggota 1">
                        </div>
                        <p class="text-blk name">
                            Isep Irmansyah
                        </p>
                        <p class="text-blk position">
                            0110221322 <span class="role-badge">Fullstack Developer</span>
                        </p>
                        <div class="social-media-links">
                            <a href="#" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" title="Facebook">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" title="Github">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 team-card-container">
                    <div class="team-card">
                        <div class="img-wrapper">
                            <img class="team-img" src="{{ asset('images/faiha.jpg') }}" alt="anggota 2">
                        </div>
                        <p class="text-blk name">
                            Fathiyah Faiha Adwa
                        </p>
                        <p class="text-blk position">
                            0110121179
                        </p>
                        <div class="social-media-links">
                            <a href="#" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" title="Facebook">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" title="Github">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="responsive-cell-block wk-desk-3 wk-ipadp-3 wk-tab-6 wk-mobile-12 team-card-container">
                    <div class="team-card">
                        <div class="img-wrapper">
                            <img class="team-img" src="{{ asset('images/ayyas.jpg') }}" alt="anggota 3">
                        </div>
                        <p class="text-blk name">
                            Muhammad Yahya Ayyas
                        </p>
                        <p class="text-blk position">
                            0110121270
                        </p>
                        <div class="social-media-links">
                            <a href="#" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" title="Facebook">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" title="Github">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
