<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
         data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
         data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div
            class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

            @canany(['home-index','teacher-schedule'])
                <div data-kt-menu-trigger="click"
                     class="menu-item {{ (Request::is('home') or Request::is('teacher/schedule*') or Request::is('student/studentNoattend')) ? 'here show' : '' }} menu-accordion">
                    <span class="menu-link">
                        <i class="fa fa-home" style="margin-right: 7px"></i>
                        <span class="menu-title">Home</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            @can('home-index')
                                <a class="menu-link {{ Request::is('home') ? 'active' : '' }}"
                                   href="{{ route('home') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                    <span class="menu-title"><i class="fa fa-home"
                                                                style="margin-right: 7px"></i>Home</span>
                                </a>
                            @endcan

                            @canany('teacher-schedule')
                                <a class="menu-link {{ Request::is('teacher/schedule*') ? 'active' : '' }}"
                                   href="{{ route('teacherSchedule') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"><i class="fa fa-table" style="margin-right: 7px"></i>Schedule</span>
                                </a>
                            @endcan

                            <a class="menu-link"
                                href="">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title"><i class="fa fa-calendar-check" style="margin-right: 7px"></i>Attendance</span>
                            </a>

                            <a class="menu-link {{ Request::is('student/studentNoattend*') ? 'active' : '' }}"
                               href="{{ route('studentNoattend') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title"><i class="fa fa-user-lock" style="margin-right: 7px"></i>No Attend</span>
                            </a>

                        </div>
                    </div>
                </div>
            @endcanany

            <div class="menu-item">
                <a class="menu-link {{ Request::is('attendance*') ? 'active' : '' }}" href="{{ route('attendanceIndex') }}">
                    <i class="fa fa-calendar-check" style="margin-right: 7px"></i>
                    <span class="menu-title">Attendance</span>
                </a>
            </div>

            <div class="menu-item">
                <a class="menu-link " href="">
                    <i class="fa fa-chalkboard-teacher" style="margin-right: 7px"></i>
                    <span class="menu-title">Teacher</span>
                </a>
            </div>

            @can('group-index')
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('group*') ? 'active' : '' }}" href="{{ route('group.index') }}">
                        <i class="fa fa-layer-group" style="margin-right: 7px"></i>
                        <span class="menu-title">Groups</span>
                    </a>
                </div>
            @endcan

            @can('student-index')
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('student*') ? 'active' : '' }}" href="{{ route('studentIndex') }}">
                            <i class="fa fa-user-graduate" style="margin-right: 7px"></i>
                        <span class="menu-title">Students</span>
                    </a>
                </div>
            @endcan

            @can('user-index')
                <div class="menu-item">
                    <a class="menu-link {{ Request::is('user*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                        <i class="fa fa-users" style="margin-right: 7px"></i>
                        <span class="menu-title">Staff</span>
                    </a>
                </div>
            @endcan

            @canany(['finance-index'])
                <div data-kt-menu-trigger="click"
                     class="menu-item {{ (Request::is('payment*')) ? 'here show' : '' }} menu-accordion">
                    <span class="menu-link">
                                            <i class="fa fa-money-bill" style="margin-right: 7px"></i>
                                            <span class="menu-title">Finance</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">

                        <div class="menu-item">
                            {{--@can('finance-report')
                                <a class="menu-link {{ Request::is('payment/report') ? 'active' : '' }}"
                                   href="{{ route('report') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                    <span class="menu-title">Report</span>
                                </a>
                            @endcan--}}

                            @can('finance-nopay')
                                <a class="menu-link {{ Request::is('payment/nopay') ? 'active' : '' }}"
                                   href="{{ route('nopay') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                    <span class="menu-title">No Pay</span>
                                </a>
                            @endcan

                            @can('finance-later')
                                <a class="menu-link {{ Request::is('payment/later') ? 'active' : '' }}"
                                   href="{{ route('later') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                    <span class="menu-title">Later</span>
                                </a>
                            @endcan

                            @can('finance-pay')
                                <a class="menu-link {{ Request::is('payment/pay') ? 'active' : '' }}" href="{{ route('pay') }}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                    <span class="menu-title">Pay</span>
                                </a>
                            @endcan

                            {{--@can('pay-index')
                                <a class="menu-link " href="{{ route('payed.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Payment</span>
                                </a>
                            @endcan--}}
                        </div>

                    </div>
                </div>
            @endcanany

            @canany(['placement-result-index','placement-category-index','placement-test-index'])
                <div data-kt-menu-trigger="click"
                     class="menu-item {{ (Request::is('testresults*') or Request::is('pc*') or Request::is('pt*')) ? 'here show' : '' }} menu-accordion">
                    <span class="menu-link">
                        <i class="fa fa-question-circle" style="margin-right: 7px"></i>
                        <span class="menu-title">Placement</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @can('placement-result-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('testresults/all') ? 'active' : '' }}"
                                   href="{{ route('ptResult') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">📜 Results</span>
                                </a>
                            </div>
                        @endcan

                        @can('placement-category-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('pc*') ? 'active' : '' }}"
                                   href="{{ route('pc.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">✨ Category</span>
                                </a>
                            </div>
                        @endcan

                        @can('placement-test-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('pt*') ? 'active' : '' }}"
                                   href="{{ route('pt.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">📚 Test</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
            @endcanany

            {{--@canany(['salary-active','salary-archive'])
                <div data-kt-menu-trigger="click"
                     class="menu-item {{ (Request::is('salary*')) ? 'here show' : '' }} menu-accordion">
                    <span class="menu-link">
                        <i class="fa fa-donate" style="margin-right: 7px"></i>
                        <span class="menu-title">Salary</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">

                        @can('salary-active')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('salary/active') ? 'active' : '' }}"
                                   href="{{ route('salaryActive') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">✅ Active</span>
                                </a>
                            </div>
                        @endcan

                        @can('salary-archive')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('salary/archive') ? 'active' : '' }}"
                                   href="{{ route('salaryArchive') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">📦 Archive</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
            @endcanany--}}

            @canany(['task-index'])
                <div data-kt-menu-trigger="click"
                     class="menu-item {{ (Request::is('task*') or Request::is('task*')) ? 'here show' : '' }} menu-accordion">
                    <span class="menu-link">
                                            <i class="fa fa-tasks" style="margin-right: 7px"></i>
                                            <span class="menu-title">Tasks</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @can('task-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('task*') ? 'active' : '' }}"
                                   href="{{ route('task.index') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                    <span class="menu-title">Task</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
            @endcan

            @canany(['book-index'])
                <div data-kt-menu-trigger="click"
                     class="menu-item {{ (Request::is('book*') or Request::is('book*')) ? 'here show' : '' }} menu-accordion">
                <span class="menu-link">
                                        <i class="fa fa-book" style="margin-right: 7px"></i>
                                        <span class="menu-title">Library</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @can('book-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('book*') ? 'active' : '' }}"
                                   href="{{ route('book.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                    <span class="menu-title">Books</span>
                                </a>
                            </div>
                        @endcan

                        @can('book-give')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('book/give') ? 'active' : '' }}"
                                   href="{{ route('bookGive') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                    <span class="menu-title">Give</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
            @endcan

            @canany(['filial-index','permission-index','role-index','direction-index', 'lang-index', 'day-index','room-index','cource-index','position-index'])
                <div data-kt-menu-trigger="click"
                     class="menu-item {{ (Request::is('roles*') or Request::is('permissions*') or Request::is('day*') or Request::is('room*') or Request::is('cource*') or Request::is('tags*') or Request::is('filial*') or Request::is('direction*') or Request::is('lang*') or Request::is('day*') or Request::is('position*')) ? 'here show' : '' }}  menu-accordion">
                                        <span class="menu-link">
                                            <i class="fa fa-cog" style="margin-right: 7px"></i>
                                            <span class="menu-title">Settings</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        @can('filial-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('filial*') ? 'active' : '' }}"
                                   href="{{ route('filial.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"><i class="fa fa-building"
                                                                style="margin-right: 7px"></i> Filial</span>
                                </a>
                            </div>
                        @endcan

                        @can('room-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('room*') ? 'active' : '' }}"
                                   href="{{ route('room.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>

                                                </span>
                                    <span class="menu-title"><i class="fa fa-inbox"
                                                                style="margin-right: 7px"></i>Room</span>
                                </a>
                            </div>
                        @endcan

                        @can('cource-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('cource*') ? 'active' : '' }}"
                                   href="{{ route('cource.index') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                    <span class="menu-title"><i class="fa fa-database"
                                                                style="margin-right: 7px"></i> Cource</span>
                                </a>
                            </div>
                        @endcan

                        @can('role-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('roles*') ? 'active' : '' }}"
                                   href="{{ route('roles.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"><i class="fa fa-user-lock"
                                                                style="margin-right: 7px"></i>Roles</span>
                                </a>
                            </div>
                        @endcan

                        @can('position-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('position*') ? 'active' : '' }}"
                                   href="{{ route('position.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title"><i class="fa fa-user-lock"
                                                                style="margin-right: 7px"></i>Position</span>
                                </a>
                            </div>
                        @endcan

                        @can('permission-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('permissions*') ? 'active' : '' }}"
                                   href="{{ route('permissions.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title"><i class="fa fa-key"
                                                                style="margin-right: 7px"></i>Permissions</span>
                                </a>
                            </div>
                        @endcan

                        @can('direction-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('direction*') ? 'active' : '' }}"
                                   href="{{ route('direction.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                    <span class="menu-title"><i class="fa fa-directions"
                                                                style="margin-right: 7px"></i> Direction</span>
                                </a>
                            </div>
                        @endcan

                        @can('lang-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('lang*') ? 'active' : '' }}"
                                   href="{{ route('lang.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                    <span class="menu-title"><i class="fa fa-language"
                                                                style="margin-right: 7px"></i> Languages</span>
                                </a>
                            </div>
                        @endcan

                        @can('day-index')
                            <div class="menu-item">
                                <a class="menu-link {{ Request::is('day*') ? 'active' : '' }}"
                                   href="{{ route('day.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                                    <span class="menu-title"><i class="fa fa-calendar-day"
                                                                style="margin-right: 7px"></i> Days</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
            @endcanany
        </div>
    </div>
</div>
