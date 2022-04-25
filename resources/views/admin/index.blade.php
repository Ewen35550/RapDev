@extends('layouts.admin')

@section('content')

    <section class="container">
        <h1>Admin Panel</h1>

        <div id="dz-root"></div>

        <article>
            <section>
                <div class="admin_group">
                    <div class="item">
                        <a href="{{ route('admin.rappeurs') }}"><h2>Rappeurs</h2></a>
                        <p>2200 rappeurs</p>
                    </div>
                    <div class="item">
                        <h2>Albums</h2>
                        <p>6000 albums</p>
                    </div>
                    <div class="item">
                        <h2>Sons</h2>
                        <p>+100000 musiques</p>
                    </div>
                </div>
                
                <div class="graphique item">
                    <div class="title">
                        <h3>Utilisateurs</h3>

                        <select name="date" id="date">
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                        </select>
                    </div>
                    <div class="graph">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                
                <div class="item">
                    <h2>Derniers rappeurs</h2>
                    
                    <ul class="list">
                        <a href="">
                            <li>
                                <div>
                                    <img src="{{ asset('img/Damso.jpg') }}" alt="">
                                    <span>Damso</span>
                                </div>
                                <span>18/02/2022</span>
                            </li>
                        </a>
                        <a href="">
                            <li>
                                <div>
                                    <img src="{{ asset('img/Damso.jpg') }}" alt="">
                                    <span>Damso</span>
                                </div>
                                <span>18/02/2022</span>
                            </li>
                        </a>
                        <a href="">
                            <li>
                                <div>
                                    <img src="{{ asset('img/Damso.jpg') }}" alt="">
                                    <span>Damso</span>
                                </div>
                                <span>18/02/2022</span>
                            </li>
                        </a>
                        <a href="">
                            <li>
                                <div>
                                    <img src="{{ asset('img/Damso.jpg') }}" alt="">
                                    <span>Damso</span>
                                </div>
                                <span>18/02/2022</span>
                            </li>
                        </a>
                        <a href="">
                            <li>
                                <div>
                                    <img src="{{ asset('img/Damso.jpg') }}" alt="">
                                    <span>Damso</span>
                                </div>
                                <span>18/02/2022</span>
                            </li>
                        </a>
                    </ul>
                </div>
            </section>
            
            <aside>
                <div class="item">
                    <h2>P'tit Bac</h2>
                </div>
                
                <div class="item">
                    <h2>Tinder Rap</h2>
                </div>
                
                <div class="item">
                    <h2>Médias</h2>
                </div>
                
                <div class="item">
                    <h2>Demandes</h2>
                    
                    <ul class="list">
                        <a href="">
                            <li>
                                <div>
                                    <span>Damso</span>
                                </div>
                                <span>18/02/2022</span>
                            </li>
                        </a>
                        <a href="">
                            <li>
                                <div>
                                    <span>Damso</span>
                                </div>
                                <span>18/02/2022</span>
                            </li>
                        </a>
                        <a href="">
                            <li>
                                <div>
                                    <span>Damso</span>
                                </div>
                                <span>18/02/2022</span>
                            </li>
                        </a>
                        <a href="">
                            <li>
                                <div>
                                    <span>Damso</span>
                                </div>
                                <span>18/02/2022</span>
                            </li>
                        </a>
                        <a href="">
                            <li>
                                <div>
                                    <span>Damso</span>
                                </div>
                                <span>18/02/2022</span>
                            </li>
                        </a>
                    </ul>
                </div>
            </aside>
        </article>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = [
            'Janvier',
            'Février',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Août',
            'Septembre',
            'Octobre',
            'Novembre',
            'Décembre',
        ];

        const data = {
            labels: labels,
            datasets: [{
            label: 'Utilisateurs inscrits en 2022',
            backgroundColor: 'rgb(95, 122, 219)',
            borderColor: 'rgb(241, 241, 241)',
            data: [0, 10, 5, 2, 20, 30, 45, 0, 10, 5, 2, 20, 30, 45],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };
    </script>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    <script src="https://e-cdn-files.dzcdn.net/js/min/dz.js"></script> 
    <script>
        // DZ.init({
        //     appId  : '532202',
        //     channelUrl : 'http://127.0.0.1:8000/admin'
        // });

        // DZ.login(function(response) {
        //     if (response.authResponse) {
        //         console.log('Welcome!  Fetching your information.... ');
        //         DZ.api('/user/me', function(response) {
        //             console.log('Good to see you, ' + response.name + '.');
        //         });
        //     } else {
        //         console.log('User cancelled login or did not fully authorize.');
        //     }
        // }, {perms: 'basic_access,email'});

        DZ.api('/artist/9197980', function(response){
            console.log(response.name);
        });

        DZ.api('/playlist/8385070582', function(response){
            console.log(response.tracks.data[4]);
        });

        // DZ.api('/track/-3040571042', function(response){
        //     console.log(response);
        // });
    </script>

    

@endsection