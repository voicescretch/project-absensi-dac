<li :class="sidebarToggle ? 'lg:hidden' : ''">
    <h3 class="text-xs uppercase leading-[20px] text-gray-400">
        <span class="menu-group-title">
            MENU
        </span>
    </h3>
</li>

<!-- Menu Item Dashboard -->
<li>
    <a href="{{ route('kiosk.indexKiosk') }}" @click="selected = (selected === 'Dashboard' ? '':'Dashboard')"
        class="menu-item group hover:menu-item-active"
        :class="(page === 'Dashboard') ? 'menu-item-active' : 'menu-item-inactive'">
        <svg :class="(page === 'Dashboard') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'" width="24"
            height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                fill="" />
        </svg>

        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
            Dashboard
        </span>
    </a>
</li>
<!-- Menu Item Dashboard -->

<li :class="sidebarToggle ? 'lg:hidden' : ''">
    <h3 class="text-xs uppercase leading-[20px] text-gray-400">
        <span class="menu-group-title">
            KARYAWAN
        </span>
    </h3>
</li>

<!-- Menu Item Divisi -->
<li>
    <a href="{{ route('kiosk.division.index') }}" @click="selected = (selected === 'Data Divisi' ? '':'Data Divisi')"
        class="menu-item group hover:menu-item-active"
        :class="(page === 'Data Divisi') ? 'menu-item-active' : 'menu-item-inactive'">
        <svg :class="(page === 'Data Divisi') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'" width="24"
            height="24" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
            <path fill=""
                d="M101.6 186.3C90.1 205 81 225.3 74.6 246.8C69.6 263.7 79.2 281.6 96.1 286.6C113 291.6 130.9 282 135.9 265.1C154.3 203.2 203.2 154.3 265.1 135.9C282 130.9 291.7 113 286.6 96.1C281.5 79.2 263.8 69.6 246.9 74.6C225.4 81 205.1 90.1 186.3 101.6C176.3 79.4 153.9 64 128 64C92.7 64 64 92.7 64 128C64 153.9 79.4 176.3 101.6 186.3zM538.3 186.3C560.5 176.3 575.9 153.9 575.9 128C575.9 92.7 547.2 64 511.9 64C486 64 463.6 79.4 453.6 101.6C434.9 90.1 414.6 81 393.1 74.6C376.2 69.6 358.3 79.2 353.3 96.1C348.3 113 357.9 130.9 374.8 135.9C436.7 154.3 485.6 203.2 504 265.1C509 282 526.9 291.7 543.8 286.6C560.7 281.5 570.4 263.7 565.3 246.8C558.9 225.3 549.8 205 538.3 186.3zM576 512C576 486.1 560.6 463.7 538.4 453.7C549.9 435 559 414.7 565.4 393.2C570.4 376.3 560.8 358.4 543.9 353.4C527 348.4 509.1 358 504.1 374.9C485.7 436.8 436.8 485.7 374.9 504.1C358 509.1 348.3 527 353.4 543.9C358.5 560.8 376.3 570.5 393.2 565.4C414.7 559 435 549.9 453.7 538.4C463.7 560.6 486.1 576 512 576C547.3 576 576 547.3 576 512zM101.6 453.7C79.4 463.7 64 486.1 64 512C64 547.3 92.7 576 128 576C153.9 576 176.3 560.6 186.3 538.4C205 549.9 225.3 559 246.8 565.4C263.7 570.4 281.6 560.8 286.6 543.9C291.6 527 282 509.1 265.1 504.1C203.2 485.7 154.3 436.8 135.9 374.9C130.9 358 113 348.3 96.1 353.4C79.2 358.5 69.6 376.2 74.6 393.1C81 414.6 90.1 434.9 101.6 453.6zM320 256C335.6 256 350 261.6 361.1 270.9L345.8 286.2C339.2 292.8 343.9 304 353.2 304L413.7 304C419.4 304 424.1 299.3 424.1 293.6L424.1 233.1C424.1 223.8 412.9 219.2 406.3 225.7L395.1 236.9C375.3 219 348.9 208 320 208C276.4 208 238.7 232.9 220.2 269.1C214.2 280.9 218.8 295.4 230.6 301.4C242.4 307.4 256.9 302.8 262.9 291C273.5 270.2 295.1 256.1 319.9 256.1zM378.6 349.1C368 369.9 346.4 384 321.6 384C305.9 384 291.6 378.4 280.5 369.1L295.8 353.8C302.4 347.2 297.7 336 288.4 336L228 336C222.3 336 217.6 340.7 217.6 346.4L217.6 406.9C217.6 416.2 228.8 420.8 235.4 414.3L246.6 403.1C266.4 421 292.8 432 321.7 432C365.3 432 403 407.1 421.5 370.9C427.5 359.1 422.9 344.6 411.1 338.6C399.3 332.6 384.8 337.2 378.8 349z" />
        </svg>
        </svg>

        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
            Divisi
        </span>
    </a>
</li>
<!-- Menu Item Divisi -->

<!-- Menu Item Karyawan -->
<li>
    <a href="{{ route('kiosk.employee.index') }}"
        @click="selected = (selected === 'Data Karyawan' ? '':'Data Karyawan')"
        class="menu-item group hover:menu-item-active"
        :class="(page === 'Data Karyawan') ? 'menu-item-active' : 'menu-item-inactive'">
        <svg :class="(page === 'Data Karyawan') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'" width="24"
            height="24" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
            <path
                d="M448 112C456.8 112 464 119.2 464 128L464 512C464 520.8 456.8 528 448 528L160 528C151.2 528 144 520.8 144 512L144 128C144 119.2 151.2 112 160 112L448 112zM160 64C124.7 64 96 92.7 96 128L96 512C96 547.3 124.7 576 160 576L448 576C483.3 576 512 547.3 512 512L512 128C512 92.7 483.3 64 448 64L160 64zM304 312C334.9 312 360 286.9 360 256C360 225.1 334.9 200 304 200C273.1 200 248 225.1 248 256C248 286.9 273.1 312 304 312zM272 352C227.8 352 192 387.8 192 432C192 440.8 199.2 448 208 448L400 448C408.8 448 416 440.8 416 432C416 387.8 380.2 352 336 352L272 352zM576 144C576 135.2 568.8 128 560 128C551.2 128 544 135.2 544 144L544 208C544 216.8 551.2 224 560 224C568.8 224 576 216.8 576 208L576 144zM560 256C551.2 256 544 263.2 544 272L544 336C544 344.8 551.2 352 560 352C568.8 352 576 344.8 576 336L576 272C576 263.2 568.8 256 560 256zM576 400C576 391.2 568.8 384 560 384C551.2 384 544 391.2 544 400L544 464C544 472.8 551.2 480 560 480C568.8 480 576 472.8 576 464L576 400z"
                fill="" />
        </svg>

        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
            Karyawan
        </span>
    </a>
</li>
<!-- Menu Item Karyawan -->


<!-- Menu Item Employee Wages -->
<li>
    <a href="{{ route('kiosk.wage.index') }}" @click="selected = (selected === 'Gaji Karyawan' ? '':'Gaji Karyawan')"
        class="menu-item group hover:menu-item-active"
        :class="(page === 'Gaji Karyawan') ? 'menu-item-active' : 'menu-item-inactive'">
        <svg :class="(page === 'Gaji Karyawan') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'" width="24"
            height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
            <path
                d="M192 160L192 144C192 99.8 278 64 384 64C490 64 576 99.8 576 144L576 160C576 190.6 534.7 217.2 474 230.7C471.6 227.9 469.1 225.2 466.6 222.7C451.1 207.4 431.1 195.8 410.2 187.2C368.3 169.7 313.7 160.1 256 160.1C234.1 160.1 212.7 161.5 192.2 164.2C192 162.9 192 161.5 192 160.1zM496 417L496 370.8C511.1 366.9 525.3 362.3 538.2 356.9C551.4 351.4 564.3 344.7 576 336.6L576 352C576 378.8 544.5 402.5 496 417zM496 321L496 288C496 283.5 495.6 279.2 495 275C510.5 271.1 525 266.4 538.2 260.8C551.4 255.2 564.3 248.6 576 240.5L576 255.9C576 282.7 544.5 306.4 496 320.9zM64 304L64 288C64 243.8 150 208 256 208C362 208 448 243.8 448 288L448 304C448 348.2 362 384 256 384C150 384 64 348.2 64 304zM448 400C448 444.2 362 480 256 480C150 480 64 444.2 64 400L64 384.6C75.6 392.7 88.5 399.3 101.8 404.9C143.7 422.4 198.3 432 256 432C313.7 432 368.3 422.3 410.2 404.9C423.4 399.4 436.3 392.7 448 384.6L448 400zM448 480.6L448 496C448 540.2 362 576 256 576C150 576 64 540.2 64 496L64 480.6C75.6 488.7 88.5 495.3 101.8 500.9C143.7 518.4 198.3 528 256 528C313.7 528 368.3 518.3 410.2 500.9C423.4 495.4 436.3 488.7 448 480.6z" />
        </svg>

        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
            Gaji Karyawan
        </span>
    </a>
</li>
<!-- Menu Item Employee Wages -->

<li :class="sidebarToggle ? 'lg:hidden' : ''">
    <h3 class="text-xs uppercase leading-[20px] text-gray-400">
        <span class="menu-group-title">
            PRESENSI
        </span>
    </h3>
</li>

<!-- Menu Item Presensi -->
<li>
    <a href="{{ route('kiosk.attendance.index') }}"
        @click="selected = (selected === 'Data Presensi' ? '':'Data Presensi')"
        class="menu-item group hover:menu-item-active"
        :class="(page === 'Data Presensi') ? 'menu-item-active' : 'menu-item-inactive'">
        <svg :class="(page === 'Data Presensi') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'" width="24"
            height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M4.52344 4.25C4.52344 3.00736 5.5308 2 6.77344 2H17.2734C18.5161 2 19.5234 3.00736 19.5234 4.25V19.75C19.5234 20.9926 18.5161 22 17.2734 22H9.02344V22.75C9.02344 23.1642 8.68765 23.5 8.27344 23.5C7.85922 23.5 7.52344 23.1642 7.52344 22.75V22H6.77344C5.5308 22 4.52344 20.9926 4.52344 19.75V4.25ZM6.02344 15.833V19.75C6.02344 20.1642 6.35922 20.5 6.77344 20.5H13.5234V15.833H6.02344ZM13.5234 14.333H6.02344V9.66699H13.5234V14.333ZM15.0234 15.833V20.5H17.2734C17.6877 20.5 18.0234 20.1642 18.0234 19.75V15.833H15.0234ZM18.0234 14.333H15.0234V9.66699H18.0234V14.333ZM18.0234 4.25V8.16699H15.0234V3.5H17.2734C17.6877 3.5 18.0234 3.83579 18.0234 4.25ZM13.5234 3.5V8.16699H6.02344V4.25C6.02344 3.83579 6.35922 3.5 6.77344 3.5H13.5234Z"
                fill="" />
        </svg>

        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
            Presensi
        </span>
    </a>
</li>
<!-- Menu Item Presensi -->

<!-- Menu Item Check In -->
<li>
    <a href="{{ route('kiosk.checkIn') }}" @click="selected = (selected === 'Check In' ? '':'Check In')"
        class="menu-item group hover:menu-item-active"
        :class="(page === 'Check In') ? 'menu-item-active' : 'menu-item-inactive'">
        <svg :class="(page === 'Check In') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'" width="24" height="24"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
            <path
                d="M416 160L480 160C497.7 160 512 174.3 512 192L512 448C512 465.7 497.7 480 480 480L416 480C398.3 480 384 494.3 384 512C384 529.7 398.3 544 416 544L480 544C533 544 576 501 576 448L576 192C576 139 533 96 480 96L416 96C398.3 96 384 110.3 384 128C384 145.7 398.3 160 416 160zM406.6 342.6C419.1 330.1 419.1 309.8 406.6 297.3L278.6 169.3C266.1 156.8 245.8 156.8 233.3 169.3C220.8 181.8 220.8 202.1 233.3 214.6L306.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L306.7 352L233.3 425.4C220.8 437.9 220.8 458.2 233.3 470.7C245.8 483.2 266.1 483.2 278.6 470.7L406.6 342.7z" />
        </svg>

        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
            Check In
        </span>
    </a>
</li>
<!-- Menu Item Check In -->

<!-- Menu Item Check Out -->
<li>
    <a href="{{ route('kiosk.checkOut') }}" @click="selected = (selected === 'Check Out' ? '':'Check Out')"
        class="menu-item group hover:menu-item-active"
        :class="(page === 'Check Out') ? 'menu-item-active' : 'menu-item-inactive'">
        <svg :class="(page === 'Check Out') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'" width="24"
            height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
            <path
                d="M224 160C241.7 160 256 145.7 256 128C256 110.3 241.7 96 224 96L160 96C107 96 64 139 64 192L64 448C64 501 107 544 160 544L224 544C241.7 544 256 529.7 256 512C256 494.3 241.7 480 224 480L160 480C142.3 480 128 465.7 128 448L128 192C128 174.3 142.3 160 160 160L224 160zM566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L438.6 169.3C426.1 156.8 405.8 156.8 393.3 169.3C380.8 181.8 380.8 202.1 393.3 214.6L466.7 288L256 288C238.3 288 224 302.3 224 320C224 337.7 238.3 352 256 352L466.7 352L393.3 425.4C380.8 437.9 380.8 458.2 393.3 470.7C405.8 483.2 426.1 483.2 438.6 470.7L566.6 342.7z" />
        </svg>

        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
            Check Out
        </span>
    </a>
</li>
<!-- Menu Item Check Out -->