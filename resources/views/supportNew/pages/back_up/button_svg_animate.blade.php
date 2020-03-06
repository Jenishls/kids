<style>
    .animate_a {
    position: absolute;
    z-index: 2;
    height: 50px;
    padding-top: 14px;
    width: 180px;
    letter-spacing: 2px;
    text-align: center;
    font-size: 17px;
    color: black;

}

a svg,
a svg rect {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    fill: transparent;
}

a svg rect {
    stroke: #c86464;
    stroke-width: 4;
    stroke-dasharray: 500, 500;
    stroke-dashoffset: 0;
    transition: 1s;

}

a:hover svg rect {
    stroke-dasharray: 100, 400;
    stroke-dashoffset: 220;
}
</style>
<a href="" class="animate_a">
    <svg>
        <rect></rect>
    </svg>
    Button
</a>