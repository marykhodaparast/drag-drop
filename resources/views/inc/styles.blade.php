<style>
    @import "compass";
    @import "compass/css3/transform";
    //variables
    $grid-columns: 12;
    $tile-gutter-width: 6px;
    $tile-gutter-left: ceil(($tile-gutter-width / 2));
    $tile-gutter-right: floor(($tile-gutter-width / 2));

    //mixins
    // Add gutter width to height for tile that span more rows
    @mixin row-span-add-gutter ($index, $perc) {
        &.row-span-#{$index} {
            $add-gutter: $tile-gutter-width * ($index - 1);
            padding-bottom: calc(#{$perc} + #{$add-gutter});
        }
    }

    // Define square and rectangular tiles
    @mixin calc-tile-column($index, $class) {
        .col-#{$class}-#{$index} {
            &.tile {
                padding: 0;
                border-color: transparent;
                border-style: solid;
                border-top-width: 0;
                border-left-width: $tile-gutter-left;
                border-right-width: $tile-gutter-right;
                border-bottom-width: 0;
                margin-bottom: $tile-gutter-width;

                &.square {
                    $perc: percentage(($index / $grid-columns));
                    padding-bottom: $perc;

                    @for $i from 2 through 4 {
                        @include row-span-add-gutter ($i, $perc)
                    }
                }

                &.rect_2x3 {
                    $perc: percentage(($index / $grid-columns * 1.5));
                    padding-bottom: $perc;

                    @for $i from 2 through 4 {
                        @include row-span-add-gutter ($i, $perc)
                    }
                }

                &.rect_3x2 {
                    $perc: percentage(($index / $grid-columns * 0.75));
                    padding-bottom: $perc;

                    @for $i from 2 through 3 {
                        @include row-span-add-gutter ($i, $perc)
                    }
                }

                &.rect_2x1 {
                    $perc: percentage(($index / $grid-columns * 0.5));
                    padding-bottom: $perc;

                    @for $i from 2 through 3 {
                        @include row-span-add-gutter ($i, $perc)
                    }
                }

                &.rect_3x1 {
                    $perc: percentage((($index / $grid-columns) / 3));
                    padding-bottom: $perc;

                    @for $i from 2 through 3 {
                        @include row-span-add-gutter ($i, $perc)
                    }
                }

                &.rect_4x1 {
                    $perc: percentage(($index / $grid-columns * 0.5));
                    padding-bottom: $perc;

                    @for $i from 2 through 3 {
                        @include row-span-add-gutter ($i, $perc)
                    }
                }
            }
        }
    }

    // [converter] This is defined recursively in LESS, but Sass supports real loops
    @mixin loop-tile-columns($columns, $class) {
        @for $i from 1 through $columns {
            @include calc-tile-column($i, $class);
        }
    }

    // Create tiles for specific class
    @mixin make-grid-tile() {
        @include loop-tile-columns($grid-columns, xs);

        @media screen and (min-width: 768px) {
            @include loop-tile-columns($grid-columns, sm);
        }

        @media screen and (min-width: 992px) {
            @include loop-tile-columns($grid-columns, md);
        }

        @media screen and (min-width: 1200px) {
            @include loop-tile-columns($grid-columns, lg);
        }
    }

    // classes
    .row.row-tile {
        margin-left: -$tile-gutter-left;
        margin-right: -$tile-gutter-right;
        @include make-grid-tile();

        [class*="col-"] .tile-content:hover {
            box-shadow: #bbb 0px 0px 0px 2px;
        }

        .tile-content {
            position: absolute;
            //display: table-cell;
            top: 0px;
            left: 0;
            bottom: 0;
            right: 0;
            background: #4679BD;

            * {
                margin: 0;
            }

            >.tile-content-title {
                position: absolute;
                padding: $tile-gutter-width;
                left: 0;
                bottom: 0;
                right: 0;
            }
        }
    }

</style>
