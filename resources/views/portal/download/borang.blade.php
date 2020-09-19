@extends('portal.layout.app')

@section('content')
    <style type="text/css">

        .title {
            font-family: inherit;
            font-size: 2rem;
            font-weight: 600;
            line-height: inherit;
            color: #252b46;
        }
        .bg-none{
            background-color: #ffffff;
        }
        .paragraph {
            font-family: inherit;
            font-size: 1rem;
            font-weight: normal;
            line-height: inherit;
            color: #9194a1;
        }
        .tab {
            width: 100%;
            height: auto;
            padding: 8rem 0;
            margin: 25px;
        }
        .tab-menu {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            max-width: 100%;
            height: auto;
            margin: 0 auto;
            border-bottom: 1.3px solid #dbdbdb;
            transition: all 0.3s ease;
        }
        .tab-menu-link {
            position: relative;
            overflow: hidden;
            font-family: inherit;
            font-size: 0.9rem;
            font-weight: 200;
            line-height: inherit;
            cursor: pointer;
            width: calc(100% / 4);
            height: auto;
            padding: 1rem 0;
            border-bottom: 2.5px solid transparent;
            color: #9194a1;
            background: #fff;
            border-top: none;
            border-left: none;
            border-right: none;
            transition: all 0.3s ease;
        }
        .tab-menu-link::before {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: auto;
            z-index: 2;
        }
        .tab-menu-link.active {
            bottom: 0px;
            z-index: 0;
            overflow: hidden;
            border-bottom: 2.5px solid #fa5757;
            border-top: none;
            color: #252b46;
            background: #fff;
        }
        .tab-bar {
            padding: 0.5rem 0;
            overflow: hidden;
            background: #fff;
        }
        .tab-bar-content {
            display: none;
            width: 100%;
            min-height: 10rem;
            margin: 5px;
            transition: all 0.3s ease;
        }
        .tab-bar-content.active {
            display: block;
        }

    </style>
    <section class="space-pb mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <h3 class="mb-4 text-center">Senarai Borang</h3>
                        <div class="alert alert-primary" role="alert">Tiada borang buat masa kini</div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <section class="mt--3">
        <div class="container">
            <div class="row">
                <div class="tab">
                    <div class="tab-menu">
                        @foreach(portalGetDownloadGroup() as $key => $group)
                            <button class="tab-menu-link {{ ($key == "muaturun-pelajar")? "active" : "" }}" data-content="{{ $key }}">
                                <span data-title="tender">{{ $group }}</span>
                            </button>
                        @endforeach
                    </div>
                    <div class="tab-bar">
                        @foreach(portalGetDownloadGroup() as $key => $group)
                            <div class="tab-bar-content {{ ($key == "muaturun-pelajar")? "active" : "" }}" id="{{ $key }}">
                                <div class="texts">
                                    <p class="paragraph">

                                        @php $documents = portalGetDownload($key); @endphp
                                        @if($documents->count() == 0)
                                            <p class="alert alert-info">
                                                Tiada Dokumen Berkaitan {{ $group }} Buat Masa Kini
                                            </p>
                                        @else
                                            <div class="col-lg-12">
                                                <div class="accordion" id="group-{{ $key }}">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tr class="bg-success font-weight-bold text-white">
                                                                <td>#</td>
                                                                <td>Tajuk</td>
                                                                <td></td>
                                                            </tr>
                                                            @foreach($documents as $key => $document)
                                                                <tr>
                                                                    <td>{{ $key+1 }}</td>
                                                                    <td>{{ $document->name }}</td>
                                                                    <td><a class="text-info" href="#"><i class="fa fa-download"></i> Muat Turun</a> </td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        // Tabs Action
        const tabLink = document.querySelectorAll(".tab-menu-link");
        const tabContent = document.querySelectorAll(".tab-bar-content");

        tabLink.forEach((el) => {
            el.addEventListener("click", activeTab);
        });

        function activeTab(el) {
            const btnTarget = el.currentTarget;
            const content = btnTarget.dataset.content;

            tabContent.forEach((el) => {
                el.classList.remove("active");
            });

            tabLink.forEach((el) => {
                el.classList.remove("active");
            });

            document.querySelector("#" + content).classList.add("active");
            btnTarget.classList.add("active");
        }

    </script>
@endsection
