@extends('layouts.app')

@section('content')
  <style>
    :root {
      --blue: #0018dc;
      --cyan: #15d1ff;
      --ink: #0f172a;
      --muted: #475569;
      --line: #d9e6ff;
      --dark: #07124a;
    }

    * {
      box-sizing: border-box
    }


    a {
      color: inherit
    }

    .wrap {
      max-width: 1200px;
      margin: 0 auto;
    }

    header.hero {
      position: relative;
      isolation: isolate;
      overflow: hidden;
      color: #fff;
      min-height: calc(100vh - 108px);
      display: flex;
      align-items: stretch;
      background: #07111f;
    }


    header.hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background-image: url("/img/hero/pump-jack.jpg");
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      /* transform: scaleX(-1) scale(1.03); */
      z-index: -2;
    }

    /* dark overlay */
    header.hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(90deg, rgba(2, 6, 23, 0.82) 0%, rgb(2 6 23 / 38%) 48%, rgb(2 6 23 / 0%) 100%);
      z-index: -1;
      pointer-events: none;
    }

    .breadcrumbs {
      font-size: 13px;
      letter-spacing: .04em;
      text-transform: uppercase;
      opacity: .82;
      margin-bottom: 18px
    }

    header.hero .wrap {
      position: relative;
      z-index: 2;
      width: min(calc(100% - 40px), 1200px);
      min-height: calc(100vh - 108px);
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding-top: 70px;
      padding-bottom: 70px;
    }

    .eyebrow {
      display: inline-block;
      font-size: 13px;
      letter-spacing: .11em;
      text-transform: uppercase;
      font-weight: 700;
      color: #bfeeff;
      margin-bottom: 14px
    }

    h1 {
      margin: 0 0 14px;
      font-weight: 700px;
      font-size: 54px;
      line-height: 1.04;
      max-width: 920px;
      letter-spacing: -.03em
    }

    .subhead {
      margin: 0 0 20px;
      font-size: 23px;
      line-height: 1.2;
      color: #e5f1ff;
      max-width: 920px;
      font-weight: 600;
    }

    .hero-copy {
      max-width: 890px;
      color: #edf5ff;
      font-size: 18px;
      margin: 0 0 26px
    }

    .btn-row {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
      margin-bottom: 36px
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 14px 20px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 700;
      border: 1px solid rgba(255, 255, 255, .25);
      transition: .2s ease
    }

    .btn-1 {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 14px 20px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 700;
      border: 1px solid rgba(31, 30, 30, 0.25);
      transition: .2s ease
    }

    .btn:hover {
      transform: translateY(-1px)
    }

    .btn-primary {
      background: #fff;
      color: var(--blue)
    }

    .btn-secondary {
      background: transparent;
      color: #fff
    }

    .btn-secondary-1 {
      background: transparent;
      color: #1a1818b8
    }

    .patent-note {
      margin: 16px 0 14px;
      padding: 14px 16px;
      border-left: 4px solid var(--cyan);
      background: linear-gradient(180deg, rgba(255, 255, 255, .14), rgba(255, 255, 255, .08));
      color: #eef6ff;
      border-radius: 0 8px 8px 0;
      font-size: 15px;
      line-height: 1.55;
      max-width: 860px;
    }

    .patent-note.light {
      background: linear-gradient(180deg, #f7fbff 0%, #edf4ff 100%);
      color: #284163;
      border-left: 4px solid var(--blue);
      box-shadow: 0 10px 24px rgba(13, 32, 84, .06);
    }

    .patent-note a {
      color: inherit;
      text-decoration: underline;
      text-underline-offset: 2px;
      font-weight: 700;
    }

    .interactive-card,
    .hero-card,
    .card,
    .feature,
    .highlight-box,
    .cta-panel,
    .model-card,
    .spec-mobile-card,
    .comparison .box,
    .reality-item {
      position: relative;
      overflow: hidden;
      isolation: isolate;
      transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease, background .28s ease;
    }

    .interactive-card>*,
    .hero-card>*,
    .card>*,
    .feature>*,
    .highlight-box>*,
    .cta-panel>*,
    .model-card>*,
    .spec-mobile-card>*,
    .comparison .box>*,
    .reality-item>* {
      position: relative;
      z-index: 2;
    }

    .swipe-left:before,
    .swipe-left:before,
    .model-card:before,
    .spec-mobile-card:before,
    .comparison .box:before,
    .reality-item:before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(0, 24, 220, .06) 0%, rgba(21, 209, 255, .12) 48%, rgba(255, 255, 255, 0) 100%);
      opacity: 0;
      transition: opacity .28s ease;
      z-index: 0;
      pointer-events: none;
    }

    .swipe-left:after,
    .swipe-left:after,
    .model-card:after,
    .spec-mobile-card:after,
    .comparison .box:after,
    .reality-item:after {
      content: "";
      position: absolute;
      top: 0;
      width: 76%;
      height: 100%;
      background: linear-gradient(90deg, transparent 0%, rgba(21, 209, 255, .18) 50%, transparent 100%);
      transform: skewX(-24deg);
      transition: all .78s ease;
      z-index: 1;
      pointer-events: none;
    }

    .swipe-left:after,
    .model-card:after,
    .spec-mobile-card:after,
    .comparison .box:after,
    .reality-item:after,
    .swipe-left:after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background-color: #0018dc;
      transform: scaleX(0);
      /* Start with a scaleX of 0 (hidden) */
      transform-origin: left;
      /* Make the scale start from the left */
      transition: transform 0.3s ease;
      /* Smooth transition */
      z-index: 1;
    }

    .swipe-left:hover,
    .swipe-left:hover,
    .model-card:hover,
    .spec-mobile-card:hover,
    .blue-fill:hover,
    .comparison .box:hover,
    .reality-item:hover {
      transform: translateY(-3px);
      border-color: #0018dc !important;
      /* box-shadow: 0 18px 36px rgba(16, 42, 67, .08); */
      background: #ffffff;
    }

    /* .swipe-left:hover:before,
                                                                                                                                                                                                                            .swipe-left:hover:before,
                                                                                                                                                                                                                            .model-card:hover:before,
                                                                                                                                                                                                                            .spec-mobile-card:hover:before,
                                                                                                                                                                                                                            .comparison .box:hover:before,
                                                                                                                                                                                                                            .reality-item:hover:before {
                                                                                                                                                                                                                              opacity: 1;
                                                                                                                                                                                                                            } */

    .swipe-left:hover:after,
    .model-card:hover:after,
    .spec-mobile-card:hover:after,
    .comparison .box:hover:after,
    .reality-item:hover:after {
      transform: scaleX(1);
    }

    /* .swipe-left:hover:after {
                                                                                                                                                                                                                          right: 155%;
                                                                                                                                                                                                                        } */

    .hero-card:hover {
      box-shadow: 0 26px 56px rgba(0, 24, 220, .18);
      border-color: rgba(255, 255, 255, .3);
    }

    /* .swipe-left:hover,
                                                                                                                                                                                                                      .swipe-left:hover,
                                                                                                                                                                                                                      .model-card:hover,
                                                                                                                                                                                                                      .spec-mobile-card:hover,
                                                                                                                                                                                                                      .comparison .box:hover,
                                                                                                                                                                                                                      .reality-item:hover {
                                                                                                                                                                                                                        box-shadow: 0 24px 52px rgba(13, 32, 84, .12);
                                                                                                                                                                                                                        border-color: #b9d0ff;
                                                                                                                                                                                                                      } */

    .blue-fill:before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, #0018dc 0%, #1438ff 62%, #0b7fe0 100%);
      transform: translateY(100%);
      transition: transform .52s cubic-bezier(.22, .61, .36, 1);
      z-index: 0;
      pointer-events: none;
    }

    .blue-fill:after {
      content: "";
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 82% 18%, rgba(21, 209, 255, .24), transparent 30%);
      opacity: 0;
      transition: opacity .32s ease;
      z-index: 1;
      pointer-events: none;
    }

    .blue-fill:hover:before,
    .cta-panel:hover:before {
      transform: translateY(0);
    }

    .blue-fill:hover:after {
      opacity: 1;
    }

    .blue-fill:hover {
      box-shadow: 0 24px 58px rgba(0, 24, 220, .18);
      border-color: #0018dc;
    }

    .blue-fill:hover h3,
    .blue-fill:hover p,
    .blue-fill:hover li,
    .blue-fill:hover strong {
      color: #fff !important;
    }

    .blue-fill:hover .num {
      background: rgba(255, 255, 255, .14);
      color: #fff
    }

    /* 
                                                                                                                                                                                                      .highlight-box:hover a {
                                                                                                                                                                                                        color: #fff !important
                                                                                                                                                                                                      } */

    .cta-panel:hover {
      /* box-shadow: 0 24px 52px rgba(0, 24, 220, .18); */
      border-color: rgba(255, 255, 255, .22)
    }

    .model-card-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px;
      margin: 0 0 22px;
    }

    .model-card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 22px;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
    }

    .model-top {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      align-items: flex-start;
      margin-bottom: 16px;
    }

    .model-name {
      font-size: 20px;
      line-height: 1.15;
      color: #232325;
      font-weight: 800;
      letter-spacing: -.02em;
    }

    .model-badge {
      white-space: nowrap;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 34px;
      padding: 0 12px;
      border-radius: 999px;
      background: #eef5ff;
      color: var(--blue);
      font-weight: 800;
      font-size: 13px;
      border: 1px solid #d8e8ff;
    }

    .model-metrics {
      display: grid;
      gap: 12px
    }

    .model-metrics div {
      padding-top: 12px;
      border-top: 1px solid #e7efff
    }

    .model-metrics span {
      display: block;
      font-size: 12px;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: #627390;
      font-weight: 700;
      margin-bottom: 6px;
    }

    .model-metrics strong {
      display: block;
      color: #232325;
      font-size: 18px;
      line-height: 1.2;
    }

    .spec-wrap-enhanced {
      overflow: auto;
      border: 1px solid var(--line);
      border-radius: 24px;
      box-shadow: 0 16px 40px rgba(13, 32, 84, .05);
      background: #fff;
      margin-top: 10px;
    }

    .spec-table-enhanced {
      border-collapse: separate;
      border-spacing: 0;
      width: 100%;
      min-width: 1280px;
      font-size: 14px;
    }

    .spec-table-enhanced thead th {
      position: sticky;
      top: 0;
      z-index: 2;
      background: #eef5ff;
      color: #232325;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .05em;
      border-bottom: 1px solid #dbe7ff;
    }

    .spec-table-enhanced th,
    .spec-table-enhanced td {
      padding: 14px 12px;
      border-bottom: 1px solid #e8efff;
      text-align: left;
      vertical-align: top;
    }

    .spec-table-enhanced tbody tr:nth-child(even) {
      background: #fbfdff
    }

    .spec-table-enhanced tbody tr:hover {
      background: #f5f9ff
    }

    .spec-col {
      min-width: 230px;
      font-weight: 700;
      color: #232325;
      background: linear-gradient(180deg, #ffffff, #fbfdff);
    }

    .cond-col {
      min-width: 150px;
      color: #425066;
      font-weight: 700;
    }

    .spec-desktop {
      display: block
    }

    .spec-mobile {
      display: none
    }

    .spec-mobile-card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 24px;
      padding: 22px;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
      margin-bottom: 16px;
    }

    .spec-mobile-head {
      display: flex;
      justify-content: space-between;
      gap: 12px;
      align-items: flex-start;
      margin-bottom: 14px;
    }

    .spec-mobile-head h3 {
      margin: 0;
      font-size: 24px;
      line-height: 1.14;
      color: #232325;
    }

    .spec-mobile-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
      margin-bottom: 16px;
    }

    .spec-mobile-grid div {
      background: #f7fbff;
      border: 1px solid #e1ecff;
      border-radius: 16px;
      padding: 14px;
    }

    .spec-mobile-grid span {
      display: block;
      font-size: 12px;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: #627390;
      font-weight: 700;
      margin-bottom: 6px;
    }

    .spec-mobile-grid strong {
      display: block;
      color: #232325;
      font-size: 16px;
      line-height: 1.25;
    }

    .hero-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px
    }

    .hero-card {
      background: rgba(255, 255, 255, .11);
      border: 1px solid rgba(255, 255, 255, .14);
      border-radius: 8px;
      padding: 20px;
      min-height: 164px;
      backdrop-filter: blur(7px)
    }

    .hero-card h3 {
      margin: 0 0 8px;
      font-size: 20px;
      line-height: 1.15;
      color: #fff
    }

    .hero-card p {
      margin: 0;
      color: #e8f4ff;
      font-size: 15px
    }

    /* .kicker mb-2 {
                                                                                                                                                        font-size: 12px;
                                                                                                                                                        letter-spacing: .11em;
                                                                                                                                                        text-transform: uppercase;
                                                                                                                                                        color: var(--blue);
                                                                                                                                                        font-weight: 700;
                                                                                                                                                        margin-bottom: 10px
                                                                                                                                                      } */

    h2 {
      margin: 0 0 16px;
      font-size: clamp(1.9rem, 3vw, 3rem);
      line-height: 1.05;
      letter-spacing: -.04em;
      max-width: 26ch;
      color: #1f1f21;
    }

    .lead {
      margin-bottom: 20px;
      max-width: 68ch;
      font-size: 16px;
      line-height: 1.75;
      color: #424f5d;
    }

    .grid-3 {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px
    }

    .card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 24px;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06)
    }

    .card .num {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: #eef5ff;
      color: var(--blue);
      font-weight: 800;
      margin-bottom: 14px
    }

    .card h3 {
      margin: 0 0 10px;
      font-size: 24px;
      line-height: 1.14;
      color: #232325
    }

    .card p {
      margin: 0;
      color: var(--muted)
    }

    .band {
      background: #f5f7fb;
      border-top: 1px solid #dfe9ff;
      border-bottom: 1px solid #dfe9ff
    }

    .comparison {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 22px;
      margin-top: 24px
    }

    .comparison .box {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 26px
    }

    .comparison .box h3 {
      margin: 0 0 12px;
      font-size: 28px;
      color: #232325
    }

    .bullet {
      margin: 0;
      padding-left: 20px;
      color: #243042
    }

    .bullet li {
      margin: 0 0 10px
    }

    .reality-box {
      margin-top: 24px;
      background: #f5f7fb;
      border: 1px solid #d8e8ff;
      border-radius: 7px;
      padding: 26px;
    }

    .reality-box h3 {
      margin: 0 0 12px;
      font-size: 28px;
      color: #232325
    }

    .reality-box p {
      margin: 0 0 14px;
      color: #425066
    }

    .reality-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 18px;
      margin-top: 18px
    }

    .reality-item {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 18px
    }

    .reality-item strong {
      display: block;
      color: #232325;
      font-size: 16px;
      margin-bottom: 6px
    }

    .feature-stack {
      display: grid;
      gap: 18px
    }

    .feature {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 22px
    }

    .feature h3 {
      margin: 0 0 10px;
      color: #232325;
      font-size: 24px;
      line-height: 1.14
    }

    .feature p {
      margin: 0;
      color: var(--muted)
    }

    .highlight-box {
      background: #f5f7fb;
      border: 1px solid #d8e8ff;
      border-radius: 7px;
      padding: 26px;
      height: 100%;
    }

    .highlight-box h3 {
      margin: 0 0 12px;
      font-size: 28px;
      color: #232325;
      line-height: 1.12
    }

    .highlight-box p {
      margin: 0 0 22px;
      color: #425066
    }

    .split {
      display: grid;
      grid-template-columns: 1.05fr .95fr;
      gap: 26px;
      align-items: start
    }

    .spec-wrap {
      overflow: auto;
      border: 1px solid var(--line);
      border-radius: 12px;
      box-shadow: 0 16px 40px rgba(13, 32, 84, .05);
      background: #fff
    }

    table {
      border-collapse: collapse;
      width: 100%;
      min-width: 980px;
      font-size: 14px
    }

    th,
    td {
      padding: 14px 12px;
      border-bottom: 1px solid #e8efff;
      text-align: left;
      vertical-align: top
    }

    thead th {
      background: #eef5ff;
      color: #232325;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .05em
    }

    tbody tr:nth-child(even) {
      background: #fbfdff
    }

    .notes {
      margin-top: 18px;
      color: var(--muted);
      font-size: 15px
    }

    .case-study {
      background: linear-gradient(130deg, #091553, #0018dc 58%, #0a7ad8);
      color: #fff;
      border-radius: 12px;
      padding: 34px;
      box-shadow: 0 24px 54px rgba(0, 24, 220, .24)
    }

    .case-study .eyebrow2 {
      color: #bdeeff;
      text-transform: uppercase;
      letter-spacing: .1em;
      font-weight: 700;
      font-size: 12px;
      margin-bottom: 10px
    }

    .case-study h2 {
      color: #fff;
      font-size: 40px;
      margin-bottom: 16px
    }

    .case-study p {
      color: #ebf4ff;
      margin: 0 0 16px;
      font-size: 17px
    }

    .stat-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      margin: 24px 0
    }

    .stat {
      background: rgba(255, 255, 255, .1);
      border: 1px solid rgba(255, 255, 255, .14);
      border-radius: 7px;
      padding: 22px 20px
    }

    .stat .label {
      font-size: 12px;
      letter-spacing: .1em;
      text-transform: uppercase;
      color: #bfeeff;
      font-weight: 700;
      margin-bottom: 10px
    }

    .stat .value {
      font-size: 30px;
      line-height: 1.02;
      font-weight: 800;
      margin-bottom: 8px
    }

    blockquote {
      margin: 22px 0 8px;
      padding: 0 0 0 20px;
      border-left: 3px solid rgba(255, 255, 255, .28);
      color: #fff;
      font-size: 22px;
      line-height: 1.35
    }

    .quote-src {
      color: #cfe7ff;
      font-weight: 700;
      margin-bottom: 18px
    }

    .cta {
      /* background: linear-gradient(120deg, #061760, #0018dc 56%, #0c79cf); */
      /* color: #fff; */
      padding: 72px 0
    }

    .cta-box {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 24px;
      align-items: start;
    }

    .cta h2 {
      /* color: #fff; */
      margin-bottom: 14px
    }

    .cta p {
      margin: 0;
      /* color: #e3ecff; */
      font-size: 18px;
      max-width: 780px
    }

    .cta-panel {
      background: rgba(255, 255, 255, .1);
      border: 1px solid rgb(67 64 64 / 14%);
      border-radius: 7px;
      padding: 24px;
    }

    .cta-panel h3 {
      margin: 0 0 10px;
      /* color: #fff; */
      font-size: 24px
    }

    .cta-panel ul {
      margin: 0 0 18px;
      padding-left: 20px;
      /* color: #ebf4ff */
    }

    @media (max-width:1080px) {

      .hero-grid,
      .grid-3,
      .comparison,
      .split,
      .stat-grid,
      .cta-box,
      .reality-grid,
      .model-card-grid {
        grid-template-columns: 1fr 1fr
      }
    }

    @media (max-width:760px) {
      .spec-desktop {
        display: none
      }

      .spec-mobile {
        display: block
      }

      .model-card-grid {
        grid-template-columns: 1fr
      }

      .spec-mobile-grid {
        grid-template-columns: 1fr 1fr
      }

      .wrap {
        padding: 0 18px
      }

      header.hero {
        padding: 58px 0 42px
      }

      h1 {
        font-size: 38px
      }

      .subhead {
        font-size: 22px
      }

      h2 {
        font-size: 31px
      }

      .hero-grid,
      .grid-3,
      .comparison,
      .split,
      .stat-grid,
      .cta-box,
      .reality-grid {
        grid-template-columns: 1fr
      }


      .case-study h2 {
        font-size: 31px
      }
    }

    @media (max-width: 760px) {
      header.hero {
        min-height: auto;
      }

      header.hero::before {
        background-size: cover;
        background-position: center center;
        transform: scaleX(-1) scale(1.04);
      }

      header.hero::after {
        background:
          linear-gradient(180deg,
            rgba(2, 6, 23, 0.88) 0%,
            rgba(2, 6, 23, 0.76) 56%,
            rgba(2, 6, 23, 0.62) 100%);
      }

      header.hero .wrap {
        min-height: auto;
        padding-top: 58px;
        padding-bottom: 46px;
      }
    }
  </style>


  <header class="hero fs-casing-hero">
    <style>
      /* ================================
                                     UPDATED CASING GAS HERO
                                  ================================ */

      header.hero.fs-casing-hero {
        position: relative !important;
        isolation: isolate;
        overflow: hidden;
        min-height: calc(100vh - 108px);
        display: flex;
        align-items: stretch;
        padding: 0 !important;
        background: #07111f !important;
        color: #ffffff;
      }

      header.hero.fs-casing-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -3;
        background-image: url("/img/hero/pump-jack.jpg");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        transform: none !important;
      }

      header.hero.fs-casing-hero::after {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -2;
        pointer-events: none;
        background:
          linear-gradient(90deg,
            rgba(0, 8, 30, .88) 0%,
            rgba(0, 12, 48, .76) 42%,
            rgba(0, 16, 60, .32) 72%,
            rgba(0, 16, 60, .10) 100%),
          radial-gradient(circle at 82% 16%, rgba(21, 209, 255, .20), transparent 28%);
      }

      header.hero.fs-casing-hero .fs-casing-hero-wrap {
        position: relative;
        z-index: 2;
        width: min(calc(100% - 40px), 1200px);
        max-width: 1200px;
        min-height: calc(100vh - 108px);
        margin: 0 auto;
        display: grid;
        grid-template-columns: minmax(0, 760px) minmax(280px, 380px);
        gap: 52px;
        align-items: end;
        padding: 110px 0 82px !important;
      }

      .fs-casing-hero-copy {
        max-width: 760px;
      }

      .fs-casing-hero-eyebrow {
        margin: 0 0 16px;
        color: #15d1ff;
        font-size: 13px;
        line-height: 1.2;
        font-weight: 900;
        letter-spacing: .13em;
        text-transform: uppercase;
      }

      header.hero.fs-casing-hero .fs-casing-hero-title {
        margin: 0 0 22px;
        max-width: 820px;
        color: #ffffff !important;
        font-size: clamp(44px, 5vw, 78px);
        line-height: .95;
        letter-spacing: -.06em;
        font-weight: 900;
      }

      header.hero.fs-casing-hero .fs-casing-hero-lead {
        margin: 0 0 30px;
        max-width: 700px;
        color: rgba(255, 255, 255, .84) !important;
        font-size: clamp(18px, 1.55vw, 22px);
        line-height: 1.42;
        font-weight: 500;
      }

      .fs-casing-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 30px;
      }

      .fs-casing-hero-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 50px;
        padding: 0 22px;
        border-radius: 999px;
        text-decoration: none;
        font-size: 14px;
        line-height: 1;
        font-weight: 900;
        transition:
          transform .22s ease,
          box-shadow .22s ease,
          border-color .22s ease,
          background .22s ease,
          color .22s ease;
      }

      .fs-casing-hero-btn:hover {
        transform: translateY(-2px);
      }

      .fs-casing-hero-btn-primary {
        background: #ffffff;
        color: #0018dc;
        border: 1px solid #ffffff;
        box-shadow: 0 14px 34px rgba(0, 0, 0, .20);
      }

      .fs-casing-hero-btn-primary:hover {
        background: #0018dc;
        border-color: #0018dc;
        color: #ffffff;
      }

      .fs-casing-hero-btn-secondary {
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, .28);
        background: rgba(255, 255, 255, 0);
        /* backdrop-filter: blur(8px);
                      -webkit-backdrop-filter: blur(8px); */
      }

      .fs-casing-hero-btn-secondary:hover {
        background: rgba(255, 255, 255, .14);
        border-color: rgba(255, 255, 255, .42);
        color: #ffffff;
      }

      .fs-casing-hero-benefits {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 10px;
        max-width: 860px;
      }

      .fs-casing-hero-benefit {
        position: relative;
        overflow: hidden;
        min-height: 98px;
        padding: 14px;
        border: 1px solid rgba(255, 255, 255, .18);
        border-radius: 7px;
        background: rgba(255, 255, 255, 0);
        /* backdrop-filter: blur(8px);
                        -webkit-backdrop-filter: blur(8px); */
        transition:
          transform .25s ease,
          border-color .25s ease,
          background .25s ease;
      }

      /* .fs-casing-hero-benefit::after {
                            content: "";
                            position: absolute;
                            left: 0;
                            right: 0;
                            top: 0;
                            height: 4px;
                            background: #15d1ff;
                            transform: scaleX(0);
                            transform-origin: left;
                            transition: transform .25s ease;
                          }

                          .fs-casing-hero-benefit:hover {
                            transform: translateY(-4px);
                            border-color: rgba(21, 209, 255, .45);
                            background: rgba(255, 255, 255, .12);
                          } */

      .fs-casing-hero-benefit:hover::after {
        transform: scaleX(1);
      }

      .fs-casing-hero-benefit strong {
        display: block;
        margin-bottom: 6px;
        color: #ffffff;
        font-size: 14px;
        line-height: 1.2;
        font-weight: 900;
      }

      .fs-casing-hero-benefit span {
        display: block;
        color: rgba(255, 255, 255, .76);
        font-size: 12.5px;
        line-height: 1.35;
        font-weight: 600;
      }

      .fs-casing-proof-card {
        position: relative;
        overflow: hidden;
        isolation: isolate;
        padding: 26px;
        border-radius: 7px;
        background: rgba(255, 255, 255, 0);
        border: 1px solid rgba(255, 255, 255, .16);
        /* box-shadow: 0 24px 70px rgba(0, 0, 0, .22);
                            backdrop-filter: blur(12px);
                            -webkit-backdrop-filter: blur(12px); */
        transition:
          transform .28s ease,
          box-shadow .28s ease,
          border-color .28s ease,
          background .28s ease;
      }

      /* .fs-casing-proof-card::after {
                              content: "";
                              position: absolute;
                              left: 0;
                              right: 0;
                              top: 0;
                              height: 4px;
                              background: #15d1ff;
                              transform: scaleX(0);
                              transform-origin: left;
                              transition: transform .28s ease;
                              z-index: 2;
                            } */

      /* .fs-casing-proof-card:hover {
                              transform: translateY(-4px);
                              border-color: rgba(21, 209, 255, .42);
                              background: rgba(255, 255, 255, .12);
                              box-shadow: 0 30px 78px rgba(0, 0, 0, .28);
                            } */

      .fs-casing-proof-card:hover::after {
        transform: scaleX(1);
      }

      .fs-casing-proof-card h2 {
        margin: 0 0 12px;
        color: #ffffff;
        font-size: 24px;
        line-height: 1.1;
        letter-spacing: -.035em;
        font-weight: 850;
      }

      .fs-casing-proof-card p {
        margin: 0 0 20px;
        color: rgba(255, 255, 255, .76);
        font-size: 15px;
        line-height: 1.6;
        font-weight: 500;
      }

      .fs-casing-proof-list {
        display: grid;
        gap: 12px;
      }

      .fs-casing-proof-item {
        display: grid;
        grid-template-columns: 10px minmax(0, 1fr);
        gap: 10px;
        align-items: start;
        padding-top: 12px;
        border-top: 1px solid rgba(255, 255, 255, .10);
        color: rgba(255, 255, 255, .86);
        font-size: 14px;
        line-height: 1.48;
        font-weight: 750;
        text-decoration: none;
        transition: color .22s ease;
      }

      .fs-casing-proof-item:first-child {
        padding-top: 0;
        border-top: 0;
      }

      .fs-casing-proof-item:hover {
        color: #ffffff;
      }

      .fs-casing-proof-dot {
        width: 7px;
        height: 7px;
        margin-top: 7px;
        border-radius: 999px;
        background: #ffffff;
        box-shadow: 0 0 0 7px rgba(151, 151, 151, 0.1);
      }

      @media (max-width: 1080px) {
        header.hero.fs-casing-hero {
          min-height: auto;
        }

        header.hero.fs-casing-hero .fs-casing-hero-wrap {
          min-height: auto;
          grid-template-columns: 1fr;
          gap: 34px;
          align-items: start;
          padding: 86px 0 68px !important;
        }

        .fs-casing-proof-card {
          max-width: 640px;
        }

        .fs-casing-hero-benefits {
          grid-template-columns: repeat(2, minmax(0, 1fr));
        }
      }

      @media (max-width: 700px) {
        header.hero.fs-casing-hero::before {
          background-position: center center;
        }

        header.hero.fs-casing-hero::after {
          background:
            linear-gradient(180deg,
              rgba(2, 6, 23, 0.94) 0%,
              rgba(2, 6, 23, 0.84) 54%,
              rgba(2, 6, 23, 0.62) 100%);
        }

        header.hero.fs-casing-hero .fs-casing-hero-wrap {
          width: min(calc(100% - 30px), 1200px);
          padding: 68px 0 56px !important;
        }

        header.hero.fs-casing-hero .fs-casing-hero-title {
          font-size: 40px;
          line-height: 1.03;
        }

        header.hero.fs-casing-hero .fs-casing-hero-lead {
          font-size: 17px;
          line-height: 1.45;
        }

        .fs-casing-hero-actions {
          flex-direction: column;
        }

        .fs-casing-hero-btn {
          width: 100%;
        }

        .fs-casing-hero-benefits {
          grid-template-columns: 1fr;
        }

        .fs-casing-hero-benefit {
          min-height: auto;
        }

        .fs-casing-proof-card {
          padding: 22px;
        }
      }
    </style>

    <div class="fs-casing-hero-wrap">
      <div class="fs-casing-hero-copy">
        <h1 class="fs-casing-hero-title">
          Built for wet and liquid-rich casing gas streams.
        </h1>

        <p class="fs-casing-hero-lead">
          CompressionCommander™ operates reliably in casing gas applications with liquids present, providing
          autonomous control and minimal maintenance.
        </p>

        <div class="fs-casing-hero-actions">
          <a class="fs-casing-hero-btn fs-casing-hero-btn-primary" href="#specifications">
            View Specifications
          </a>

          <a class="fs-casing-hero-btn fs-casing-hero-btn-secondary" href="#casing-gas-comparison">
            See Technology Benefits
          </a>
        </div>

        <div class="fs-casing-hero-benefits" aria-label="CompressionCommander benefits">
          <div class="fs-casing-hero-benefit">
            <strong>Handles 0–100% liquids</strong>
            <span>Reliable performance across all multiphase conditions.</span>
          </div>

          <div class="fs-casing-hero-benefit">
            <strong>Autonomous control</strong>
            <span>Maintains target pressure with minimal intervention.</span>
          </div>

          <div class="fs-casing-hero-benefit">
            <strong>Low maintenance</strong>
            <span>Designed for uptime and reduced operator tasks.</span>
          </div>

          <div class="fs-casing-hero-benefit">
            <strong>Field-ready</strong>
            <span>Robust for harsh or variable conditions.</span>
          </div>
        </div>
      </div>

      <aside class="fs-casing-proof-card">
        <h2>Patent-backed multiphase logic.</h2>

        <p>
          Supported by patented operating methods for liquid-influenced compression behavior, including
          US11098709B2.
        </p>

        <div class="fs-casing-proof-list">
          <a class="fs-casing-proof-item" href="#casing-gas-comparison">
            <span class="fs-casing-proof-dot"></span>
            <span>Designed for wet and liquid-influenced casing gas streams.</span>
          </a>

          <a class="fs-casing-proof-item" href="#application-review">
            <span class="fs-casing-proof-dot"></span>
            <span>Field-ready uptime in casing gas service.</span>
          </a>

          <a class="fs-casing-proof-item" href="#specifications">
            <span class="fs-casing-proof-dot"></span>
            <span>Models available for application review.</span>
          </a>
        </div>
      </aside>
    </div>
  </header>

  <section>
    <div class="wrap py-12">
      <div class="kicker mb-2">Why multiphase matters</div>
      <h2>Casing gas rarely behaves like clean, dry gas service.</h2>
      <p class="lead">
        Casing gas is often specified and sold like a clean gas application, but field conditions rarely stay that clean.
        Condensate, produced water, intermittent liquid carryover, pressure swings, contaminants, slug events, and
        changing operating conditions are exactly what make conventional gas-only casing gas compressors unreliable and
        maintenance-heavy in real service.
      </p>

      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>Scrubbers are not a guarantee</h3>
          <p>Scrubbers and separation equipment can reduce liquid carryover, but they do not guarantee perfectly dry gas
            under real field conditions.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">02</div>
          <h3>Slug events still reach the compressor</h3>
          <p>Intermittent upset conditions still create the trips, stress, and component damage that turn casing gas
            recovery into a reliability problem.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">03</div>
          <h3>Conventional systems become maintenance burdens</h3>
          <p>Gas-only packages often create more intervention, more downtime, and more supporting equipment when exposed
            to liquid-prone casing gas service.</p>
        </div>
      </div>

      <div class="reality-box">
        <h2>What makes casing gas compression difficult in the field</h2>
        <p class="lead">
          The challenge is not simply moving gas from low pressure to higher pressure. The challenge is doing it reliably
          when the stream is inconsistent, liquids can break through, and operating conditions do not stay steady. That is
          where conventional gas-only packages often become maintenance-heavy and why CompressionCommander™ is positioned
          differently.
        </p>
        <div class="reality-grid">
          <div class="reality-item interactive-card swipe-left">
            <strong>What operators actually see</strong>
            Casing gas service can include liquid carryover, intermittent slugging, contaminants, changing pressure, and
            off-normal events that move the application away from ideal dry-gas operation.
          </div>
          <div class="reality-item interactive-card swipe-left">
            <strong>Why conventional systems struggle</strong>
            When those conditions reach a gas-only compressor, the result is often more dependence on separation
            equipment, more trips, more operator attention, and a higher recurring maintenance burden.
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">
      <div class="kicker mb-2">Conventional vs. Fluidstream</div>
      <h2>Two very different approaches to casing gas compression.</h2>
      <p class="lead">
        CompressionCommander™ is positioned as a casing gas solution built around multiphase behavior and the commercial
        reality of keeping recovery systems online with less intervention.
      </p>

      <div class="comparison">
        <div class="box interactive-card swipe-left">
          <h3>Conventional casing gas approach</h3>
          <ul class="bullet space-y-4">
            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Relies on scrubbers and separation equipment to protect a gas-only compressor.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Still becomes vulnerable when liquids break through or slug conditions develop.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Creates more equipment, more footprint, more operator attention, and more failure points.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Often turns casing gas recovery into a constant reliability and maintenance problem.</span>
            </li>
          </ul>
        </div>

        <div class="box interactive-card swipe-left">
          <h3>CompressionCommander™ approach</h3>
          <ul class="bullet space-y-4">
            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Built around the reality that casing gas streams are imperfect and often effectively
                multiphase.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Designed to keep operating through the upset conditions that shut down conventional systems.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Reduces dependence on separation hardware as the only protection strategy.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Gives operators a more robust, lower-intervention path to continuous casing gas recovery.</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">
      <div class="kicker mb-2">The CompressionCommander™ difference</div>
      <h2>Designed for the flow you actually have.</h2>
      <p class="lead">
        CompressionCommander™ creates value because it is aligned with what casing gas service really looks like in the
        field: liquid carryover, changing operating conditions, corrosive exposure, remote operation, and the need for
        high uptime with low maintenance.
      </p>

      <div class="split">
        <div class="feature-stack">
          <div class="feature interactive-card swipe-left">
            <h3>Handles real operating envelopes</h3>
            <p>Designed for gas service in applications where liquids, slugs, and unstable conditions are part of the real
              field envelope rather than rare exceptions.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Sealed architecture for corrosive service</h3>
            <p>Sealed design supports corrosive and H₂S-bearing service while minimizing exposure risk in harsher
              operating environments.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Sand-conscious sealing philosophy</h3>
            <p>Sealing strategy is better aligned with harsher field environments where abrasive contaminants can
              accelerate wear in conventional systems.</p>
          </div>
          <div class="feature interactive-card swipe-left">
            <h3>Autonomous control for lower intervention</h3>
            <p>Autonomous controls are designed to support extended operation without constant operator attention,
              especially where remote service and uptime matter.</p>
          </div>
        </div>

        <div class="highlight-box interactive-card swipe-left">
          <h3>Control strategy operators can trust</h3>
          <p>CompressionCommander™ does not rely on unrealistic promises about perfect gas quality. It monitors operating
            behavior and responds to the conditions that suggest liquids, slugs, or other upset events are creating damage
            risk.</p>

          <ul class="bullet space-y-4">
            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span><strong>What it monitors:</strong> pressure behavior, dynamic system response, load changes, and other
                operating patterns associated with harmful conditions.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span><strong>What it does:</strong> automatically modifies operation to mitigate risk, reduce mechanical
                stress, and keep the system in a safer operating window.</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span><strong>Why it matters:</strong> the result is a casing gas package that is better suited to remote,
                variable, lower-touch operation.</span>
            </li>
          </ul>

          <div class="patent-note light" style="margin-top:55px;">
            Patent reference:
            <a href="/patented-technology#us11098709b2">US11098709B2</a>
            supports the liquid-aware compression response behind this protection strategy.
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">
      <div class="kicker mb-2">Intelligent protection</div>
      <h2>Detects risk conditions. Responds automatically. Protects continuously.</h2>
      <p class="lead">
        In casing gas service, the real value of the controls strategy is not claiming perfect knowledge of what is inside
        the machine every second. It is recognizing damaging operating behavior early enough to protect components,
        preserve stability, and reduce avoidable maintenance events.
      </p>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <h3>Pressure and response awareness</h3>
          <p>System behavior is monitored for patterns associated with liquid carryover, slug events, abnormal loading,
            and other harmful conditions.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Automatic mitigation</h3>
          <p>Controls adjust operation to reduce stress and keep the package in a safer operating window without relying
            on constant human intervention.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Continuous protection value</h3>
          <p>This lowers the risk of trips, damage, and recurring operator callouts while supporting more dependable
            casing gas recovery.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="fs-cg-diff-section band" id="casing-gas-comparison">
    <style>
      .fs-cg-diff-section {
        --cg-blue: #0018dc;
        --cg-cyan: #15d1ff;
        --cg-ink: #07111f;
        --cg-muted: #475569;
        --cg-line: #d9e6ff;
        --cg-dark: #07124a;

        position: relative;
        overflow: hidden;
        background: #f5f7fb;
        border-top: 1px solid #dfe9ff;
        border-bottom: 1px solid #dfe9ff;
      }

      .fs-cg-diff-section,
      .fs-cg-diff-section * {
        box-sizing: border-box;
      }

      .fs-cg-diff-head {
        /* display: grid; */
        grid-template-columns: minmax(0, 1.05fr) minmax(300px, 0.78fr);
        gap: 34px;
        align-items: end;
        margin-bottom: 26px;
      }

      .fs-cg-diff-kicker {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 12px;
        color: var(--cg-blue);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .11em;
        text-transform: uppercase;
      }

      /* .fs-cg-diff-head h2 {
                                                                                          margin: 0;
                                                                                          max-width: 760px;
                                                                                          font-size: clamp(1.9rem, 3vw, 3rem);
                                                                                          line-height: 1.05;
                                                                                          letter-spacing: -.04em;
                                                                                          color: #1f1f21;
                                                                                        } */

      /* .fs-cg-diff-head h2 span {
                                                                                          color: var(--cg-blue);
                                                                                        }

                                                                                        .fs-cg-diff-head p {
                                                                                          margin: 0;
                                                                                          color: var(--cg-muted);
                                                                                          font-size: 16px;
                                                                                          line-height: 1.75;
                                                                                        } */

      .fs-cg-diff-summary {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 22px;
      }

      .fs-cg-diff-card {
        position: relative;
        overflow: hidden;
        isolation: isolate;
        background: #ffffff;
        border: 1px solid var(--cg-line);
        border-radius: 7px;
        padding: 24px;
        box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
        transition: transform .28s ease, border-color .28s ease, background .28s ease;
      }

      .fs-cg-diff-card::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--cg-blue);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .3s ease;
        z-index: 1;
      }

      .fs-cg-diff-card:hover {
        transform: translateY(-3px);
        border-color: var(--cg-blue);
        background: #ffffff;
      }

      .fs-cg-diff-card:hover::after {
        transform: scaleX(1);
      }

      .fs-cg-diff-card strong {
        position: relative;
        z-index: 2;
        display: block;
        margin-bottom: 10px;
        color: #232325;
        font-size: 20px;
        line-height: 1.15;
        letter-spacing: -.02em;
        font-weight: 800;
      }

      .fs-cg-diff-card p {
        position: relative;
        z-index: 2;
        margin: 0;
        color: var(--cg-muted);
        font-size: 15px;
        line-height: 1.62;
      }

      .fs-cg-diff-table {
        overflow: hidden;
        border: 1px solid var(--cg-line);
        border-radius: 7px;
        background: #ffffff;
        box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
      }

      .fs-cg-diff-table-head,
      .fs-cg-diff-row {
        display: grid;
        grid-template-columns: 0.9fr 1fr 1fr;
      }

      .fs-cg-diff-table-head {
        background: #0018dc;
        color: #ffffff;
      }

      .fs-cg-diff-table-head div {
        padding: 18px 20px;
        border-right: 1px solid rgba(255, 255, 255, .12);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .1em;
        text-transform: uppercase;
      }

      .fs-cg-diff-table-head div:last-child {
        border-right: none;
        background: var(--cg-blue);
      }

      .fs-cg-diff-row {
        border-top: 1px solid var(--cg-line);
        transition: background .22s ease;
      }

      .fs-cg-diff-row:hover {
        background: #f8fbff;
      }

      .fs-cg-diff-cell {
        min-height: 78px;
        padding: 18px 20px;
        display: flex;
        align-items: center;
        border-right: 1px solid var(--cg-line);
        color: var(--cg-muted);
        font-size: 15px;
        line-height: 1.45;
        font-weight: 650;
      }

      .fs-cg-diff-cell:last-child {
        border-right: none;
      }

      .fs-cg-diff-criteria {
        color: #232325;
        font-weight: 800;
        letter-spacing: -.015em;
      }

      .fs-cg-diff-fluidstream {
        position: relative;
        color: #232325;
        font-weight: 800;
        background: #f6f7fb;
      }

      .fs-cg-diff-fluidstream::before {
        content: "";
        width: 8px;
        height: 8px;
        margin-right: 11px;
        flex: 0 0 auto;
        border-radius: 999px;
        background: var(--cg-cyan);
        box-shadow: 0 0 0 5px rgba(21, 209, 255, .14);
      }



      .fs-cg-diff-bottom {
        display: grid;
        grid-template-columns: minmax(0, 1fr) auto;
        gap: 22px;
        align-items: center;
        margin-top: 22px;
        padding: 26px;
        border-radius: 7px;
        background: #0018dc;
        color: #ffffff;
        overflow: hidden;
        position: relative;
      }

      /* 
                                  .fs-cg-diff-bottom::after {
                                    content: "";
                                    position: absolute;
                                    width: 230px;
                                    height: 230px;
                                    right: -90px;
                                    top: -120px;
                                    border-radius: 999px;
                                    background: rgba(21, 209, 255, .18);
                                    pointer-events: none;
                                  } */

      .fs-cg-diff-bottom-content {
        position: relative;
        z-index: 1;
      }

      .fs-cg-diff-bottom strong {
        display: block;
        margin-bottom: 8px;
        color: #ffffff;
        font-size: 22px;
        line-height: 1.18;
        letter-spacing: -.02em;
        font-weight: 800;
      }

      .fs-cg-diff-bottom p {
        margin: 0;
        max-width: 760px;
        color: #e8f4ff;
        line-height: 1.65;
        font-size: 15px;
      }

      .fs-cg-diff-bottom .btn {
        position: relative;
        z-index: 1;
        white-space: nowrap;
        box-shadow: none;
      }

      @media (max-width: 1080px) {

        .fs-cg-diff-head,
        .fs-cg-diff-summary,
        .fs-cg-diff-bottom {
          grid-template-columns: 1fr;
        }
      }

      @media (max-width: 900px) {
        .fs-cg-diff-table-head {
          display: none;
        }

        .fs-cg-diff-row {
          grid-template-columns: 1fr;
          border-top: 8px solid #f1f4f9;
        }

        .fs-cg-diff-row:first-child {
          border-top: 0;
        }

        .fs-cg-diff-cell {
          min-height: auto;
          display: block;
          border-right: none;
          border-bottom: 1px solid var(--cg-line);
          padding: 16px 18px;
        }

        .fs-cg-diff-cell:last-child {
          border-bottom: 0;
        }

        .fs-cg-diff-cell::before {
          display: block;
          margin-bottom: 7px;
          color: var(--cg-blue);
          font-size: 11px;
          font-weight: 850;
          letter-spacing: .11em;
          text-transform: uppercase;
        }

        .fs-cg-diff-criteria::before {
          content: "Criteria";
        }

        .fs-cg-diff-conventional::before {
          content: "Conventional Casing Gas Compression";
        }

        .fs-cg-diff-fluidstream::before {
          content: "CompressionCommander™";
          width: auto;
          height: auto;
          margin: 0 0 7px 0;
          border-radius: 0;
          background: transparent;
          box-shadow: none;
        }

        .fs-cg-diff-fluidstream {
          display: block;
        }
      }

      @media (max-width: 760px) {
        .fs-cg-diff-bottom {
          padding: 22px;
        }
      }
    </style>

    <div class="wrap py-12">
      <div class="kicker mb-2">Casing Gas Differentiation</div>

      <div class="fs-cg-diff-head">
        <div>
          <h2>
            Built for casing gas conditions where production optimization depends on
            <span>stable drawdown.</span>
          </h2>
        </div>

        <p class="lead">
          CompressionCommander™ is designed for casing gas applications where changing well rates,
          liquid loading, intermittent flow, separator dependence, winter freeze exposure, and restart
          conditions can limit how aggressively operators reduce casing pressure and improve production.
        </p>
      </div>

      <div class="fs-cg-diff-summary">
        <article class="fs-cg-diff-card">
          <strong>Production-focused pressure reduction</strong>
          <p>
            Supports casing pressure reduction where lower backpressure can improve drawdown, well unloading,
            and production response.
          </p>
        </article>

        <article class="fs-cg-diff-card">
          <strong>Reduced separator dependence</strong>
          <p>
            Handles wet, liquid-influenced casing gas without requiring perfect upstream gas-liquid separation
            before compression.
          </p>
        </article>

        <article class="fs-cg-diff-card">
          <strong>Less freeze-prone infrastructure</strong>
          <p>
            Reducing reliance on scrubbers and upstream separation equipment helps avoid common winter operating
            problems in casing gas service.
          </p>
        </article>
      </div>

      <div class="fs-cg-diff-table" role="table"
        aria-label="Conventional casing gas compression versus Fluidstream CompressionCommander comparison">
        <div class="fs-cg-diff-table-head" role="row">
          <div role="columnheader">Criteria</div>
          <div role="columnheader">Conventional Casing Gas Compression</div>
          <div role="columnheader">Fluidstream CompressionCommander™</div>
        </div>

        <div class="fs-cg-diff-row" role="row">
          <div class="fs-cg-diff-cell fs-cg-diff-criteria" role="cell">Variable well flow</div>
          <div class="fs-cg-diff-cell fs-cg-diff-conventional" role="cell">Struggles with unstable or intermittent flow
          </div>
          <div class="fs-cg-diff-cell fs-cg-diff-fluidstream" role="cell">Adapts to changing well flow</div>
        </div>

        <div class="fs-cg-diff-row" role="row">
          <div class="fs-cg-diff-cell fs-cg-diff-criteria" role="cell">Liquid loading and slugging</div>
          <div class="fs-cg-diff-cell fs-cg-diff-conventional" role="cell">Can cause trips, limits, or damage risk</div>
          <div class="fs-cg-diff-cell fs-cg-diff-fluidstream" role="cell">Built for liquid-influenced operation</div>
        </div>

        <div class="fs-cg-diff-row" role="row">
          <div class="fs-cg-diff-cell fs-cg-diff-criteria" role="cell">Separator dependence</div>
          <div class="fs-cg-diff-cell fs-cg-diff-conventional" role="cell">Often needs upstream separation</div>
          <div class="fs-cg-diff-cell fs-cg-diff-fluidstream" role="cell">Reduces or eliminates separator reliance</div>
        </div>

        <div class="fs-cg-diff-row" role="row">
          <div class="fs-cg-diff-cell fs-cg-diff-criteria" role="cell">Winter freeze exposure</div>
          <div class="fs-cg-diff-cell fs-cg-diff-conventional" role="cell">Scrubbers can freeze, trip, or need attention
          </div>
          <div class="fs-cg-diff-cell fs-cg-diff-fluidstream" role="cell">Less freeze-prone upstream equipment</div>
        </div>

        <div class="fs-cg-diff-row" role="row">
          <div class="fs-cg-diff-cell fs-cg-diff-criteria" role="cell">Backpressure reduction</div>
          <div class="fs-cg-diff-cell fs-cg-diff-conventional" role="cell">Limited by upset sensitivity</div>
          <div class="fs-cg-diff-cell fs-cg-diff-fluidstream" role="cell">Supports lower casing pressure and drawdown
          </div>
        </div>

        <div class="fs-cg-diff-row" role="row">
          <div class="fs-cg-diff-cell fs-cg-diff-criteria" role="cell">Restart after shut-in</div>
          <div class="fs-cg-diff-cell fs-cg-diff-conventional" role="cell">Restart can be unreliable after slugging</div>
          <div class="fs-cg-diff-cell fs-cg-diff-fluidstream" role="cell">Better suited for wet, variable restarts</div>
        </div>

        <div class="fs-cg-diff-row" role="row">
          <div class="fs-cg-diff-cell fs-cg-diff-criteria" role="cell">Production optimization</div>
          <div class="fs-cg-diff-cell fs-cg-diff-conventional" role="cell">Can force conservative operating limits</div>
          <div class="fs-cg-diff-cell fs-cg-diff-fluidstream" role="cell">Supports more aggressive optimization</div>
        </div>

        <div class="fs-cg-diff-row" role="row">
          <div class="fs-cg-diff-cell fs-cg-diff-criteria" role="cell">Maintenance in unstable service</div>
          <div class="fs-cg-diff-cell fs-cg-diff-conventional" role="cell">Higher with liquids and repeated restarts</div>
          <div class="fs-cg-diff-cell fs-cg-diff-fluidstream" role="cell">Lower-maintenance casing gas approach</div>
        </div>
      </div>

      <div class="fs-cg-diff-bottom">
        <div class="fs-cg-diff-bottom-content">
          <strong>
            For casing gas wells where the objective is not just compression, it is production response.
          </strong>
          <p>
            CompressionCommander™ is best suited for wells where casing pressure reduction, liquid-tolerant operation,
            reduced separator dependence, and cold-weather uptime can support stronger production optimization economics.
          </p>
        </div>

        <a class="btn btn-primary" href="/contact">Request casing gas fit review</a>
      </div>
    </div>
  </section>


  <section class="fs-model-selector-section" id="specifications">
    <style>
      .fs-model-selector-section {
        --blue: #0018dc;
        --cyan: #15d1ff;
        --ink: #071126;
        --text: #19243a;
        --muted: #647086;
        --line: #dfe6f1;
        --soft: #f5f7fb;
        --white: #ffffff;
        background: var(--soft);
        padding: 66px 0;
        color: var(--text);
      }

      .fs-model-selector-section,
      .fs-model-selector-section * {
        box-sizing: border-box;
      }

      .fs-ms-wrap {
        width: min(1200px, calc(100% - 44px));
        margin: 0 auto;
      }

      .fs-ms-section-head {
        /* display: grid; */
        grid-template-columns: 260px 1fr;
        gap: 44px;
        align-items: start;
        margin-bottom: 28px;
      }

      .fs-ms-rail {
        padding-top: 14px;
        color: var(--blue);
        font-size: 13px;
        font-weight: 950;
        letter-spacing: .1em;
        text-transform: uppercase;
      }

      /* .fs-ms-section-head h2 {
                                                                                                              font-size: clamp(30px, 3.2vw, 46px);
                                                                                                              line-height: 1.02;
                                                                                                              margin: 0 0 14px;
                                                                                                              letter-spacing: -.035em;
                                                                                                              color: var(--ink);
                                                                                                            } */
      /* 
                                                                                                          .fs-ms-lead {
                                                                                                            font-size: 17px;
                                                                                                            color: #56647a;
                                                                                                            max-width: 860px;
                                                                                                            margin: 0;
                                                                                                            line-height: 1.65;
                                                                                                          } */

      .fs-ms-spec-note {
        margin: 14px 0 0;
        font-size: 14px;
        color: var(--muted);
        font-weight: 700;
        line-height: 1.6;
      }

      .fs-ms-global-control {
        position: sticky;
        top: 102px;
        z-index: 20;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        width: fit-content;
        max-width: 100%;
        margin: 0 0 18px auto;
        background: rgba(255, 255, 255, .94);
        border: 1px solid rgba(223, 230, 241, .95);
        border-radius: 999px;
        padding: 10px 12px 10px 18px;
        box-shadow: 0 10px 24px rgba(7, 17, 38, .07);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
      }

      .fs-ms-global-control strong {
        display: inline;
        color: var(--ink);
        font-size: 15px;
        font-weight: 950;
        white-space: nowrap;
      }

      .fs-model-selector-section select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;

        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='%230018dc' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 14px center;

        border: 1px solid #cfd8ea;
        border-radius: 999px;
        color: var(--ink);

        font-size: 15px !important;
        line-height: 1.25 !important;
        font-weight: 800 !important;

        padding: 10px 44px 10px 15px;
        min-width: 220px;
        outline: none;
        cursor: pointer;

        transition: border-color .24s ease, box-shadow .24s ease;
      }

      .fs-model-selector-section select {
        font-size: 15px !important;
        line-height: 1.25 !important;
        font-weight: 800 !important;
      }

      .fs-model-selector-section select option {
        font-size: 15px !important;
        line-height: 1.35 !important;
        font-weight: 500 !important;
      }

      .fs-model-selector-section select option {
        font-size: 15px !important;
        line-height: 1.35 !important;
        font-weight: 500 !important;
        color: #071126;
        background: #ffffff;
      }

      .fs-model-selector-section select:focus {
        border-color: var(--blue);
        box-shadow: 0 0 0 4px rgba(0, 24, 220, .08);
      }

      .fs-ms-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
      }

      .fs-ms-model-card {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid var(--line);
        border-radius: 7px;
        box-shadow: 0 14px 36px rgba(7, 17, 38, .065);
        transition:
          transform .24s ease,
          border-color .24s ease,
          box-shadow .24s ease,
          background .24s ease;
      }

      .fs-ms-model-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 5;
        height: 4px;
        background: var(--blue);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .3s ease;
      }

      .fs-ms-model-card:hover {
        transform: translateY(-3px);
        border-color: var(--blue);
        /* box-shadow: 0 22px 46px rgba(16, 42, 67, .10); */
        background: #ffffff;
      }

      .fs-ms-model-card:hover::before {
        transform: scaleX(1);
      }

      .fs-ms-card-top {
        padding: 24px 22px 18px;
        border-bottom: 1px solid rgba(223, 230, 241, .9);
        background: linear-gradient(180deg, #ffffff, #f9fbff);
      }

      .fs-ms-family {
        display: inline-flex;
        color: var(--blue);
        font-size: 10px;
        font-weight: 950;
        letter-spacing: .1em;
        text-transform: uppercase;
      }

      .fs-ms-model-line {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 12px;
        margin-top: 8px;
      }

      .fs-ms-model-line h3 {
        font-size: 24px;
        line-height: 1.08;
        margin: 0;
        color: var(--ink);
        letter-spacing: -.02em;
        font-weight: 900;
      }

      .fs-ms-hp-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        padding: 7px 11px;
        border-radius: 999px;
        background: #f2f6ff;
        color: var(--blue);
        border: 1px solid #dce6fb;
        font-weight: 900;
        font-size: 12px;
        letter-spacing: .04em;
      }

      .fs-ms-pressure-control {
        padding: 16px 18px 0;
      }

      .fs-ms-pressure-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 8px;
      }

      .fs-ms-pressure-control label,
      .fs-ms-reading-label,
      .fs-ms-card-specs b {
        display: block;
        color: #647086;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .075em;
        font-weight: 900;
      }

      .fs-ms-primary-reading {
        margin: 14px 18px 16px;
        background: #0018dc;
        color: #ffffff;
        border-radius: 7px;
        padding: 17px 18px;
        box-shadow: none;
      }

      .fs-ms-reading-label {
        color: #98edff !important;
        background: transparent !important;
        box-shadow: none !important;
        border: none !important;
        padding: 0 !important;
        margin-bottom: 8px;
      }

      .fs-ms-reading-value {
        display: grid;
        gap: 4px;
        font-size: 20px;
        font-weight: 950;
      }

      .fs-ms-reading-value .metric,
      .fs-ms-reading-value .imperial {
        font-size: 20px;
        line-height: 1.2;
        font-weight: 950;
        color: #ffffff;
        white-space: nowrap;
      }

      .fs-ms-reading-value small {
        font-size: 12px;
        color: #dcecff;
        font-weight: 800;
      }

      .fs-ms-card-specs {
        padding: 0 18px 18px;
        display: grid;
        gap: 10px;
      }

      .fs-ms-card-specs>div {
        position: relative;
        background: #f7f9fd;
        border: 1px solid #e7edf6;
        border-radius: 7px;
        padding: 13px 14px 13px 42px;
        box-shadow: none;
      }

      .fs-ms-card-specs>div::before {
        content: "";
        position: absolute;
        left: 13px;
        top: 15px;
        width: 17px;
        height: 17px;
        border-radius: 5px;
        background: var(--blue);
        opacity: .9;
      }

      .fs-ms-card-specs span {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: baseline;
        font-size: 16px;
        font-weight: 950;
        color: var(--ink);
      }

      .fs-ms-card-specs small {
        font-size: 12px;
        color: #647086;
        font-weight: 850;
      }

      .fs-ms-sizing-notes {
        margin-top: 22px;
        background: #fbfcff;
        border: 1px solid var(--line);
        border-radius: 7px;
        padding: 18px 20px;
        color: #647086;
        font-size: 13px;
        box-shadow: 0 10px 28px rgba(7, 17, 38, .045);
        line-height: 1.65;
      }

      .fs-ms-sizing-notes strong {
        display: block;
        color: var(--ink);
        font-size: 14px;
        margin-bottom: 8px;
      }

      .fs-ms-sizing-notes ol {
        margin: 0;
        padding-left: 18px;
        display: grid;
        gap: 7px;
      }

      .fs-ms-sizing-notes li {
        padding-left: 4px;
      }

      @media(max-width:1120px) {
        .fs-ms-cards {
          grid-template-columns: repeat(2, 1fr);
        }

        .fs-ms-section-head {
          grid-template-columns: 1fr;
          gap: 12px;
        }
      }

      @media(max-width:720px) {
        .fs-model-selector-section {
          padding: 46px 0;
        }

        .fs-ms-wrap {
          width: min(100% - 30px, 1200px);
        }

        .fs-ms-global-control {
          position: static;
          width: 100%;
          margin-left: 0;
          margin-right: 0;
          border-radius: 7px;
          align-items: stretch;
          flex-direction: column;
          padding: 14px;
        }

        .fs-ms-global-control strong {
          font-size: 14px;
        }

        .fs-model-selector-section select {
          width: 100%;
          min-width: 0;
        }

        .fs-ms-cards {
          grid-template-columns: 1fr;
        }

        .fs-ms-model-line h3 {
          font-size: 22px;
        }
      }
    </style>

    <div class="fs-ms-wrap">
      <div class="fs-ms-section-head">
        <div class="fs-ms-rail">Specifications</div>
        <div>
          <h2>Compare models by inlet pressure.</h2>
          <p class="lead">
            Select an inlet pressure to review gas capacity across the CompressionCommander™ model range.
          </p>
          <p class="lead">
            Additional model sizes and configurations are available for applications outside the standard range shown.
          </p>
        </div>
      </div>

      <div class="fs-ms-global-control">
        <div>
          <strong>Compare all models at</strong>
        </div>

        <select id="fsGlobalPressure">
          <option value="0">5 psi | 34 kPa</option>
          <option value="1">10 psi | 69 kPa</option>
          <option value="2">20 psi | 138 kPa</option>
          <option value="3">30 psi | 207 kPa</option>
          <option value="4" selected>50 psi | 345 kPa</option>
        </select>
      </div>

      <div class="fs-ms-cards">
        <article class="fs-ms-model-card" data-card-index="0">
          <div class="fs-ms-card-top">
            <span class="fs-ms-family">CompressionCommander™</span>
            <div class="fs-ms-model-line">
              <h3>CC825 (015013)</h3>
              <span class="fs-ms-hp-badge">15 HP</span>
            </div>
          </div>

          <div class="fs-ms-pressure-control">
            <div class="fs-ms-pressure-row">
              <label for="fsPressure0">Inlet pressure</label>
            </div>
            <select id="fsPressure0" class="fs-pressure-select" data-card="0">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">10 psi | 69 kPa</option>
              <option value="2">20 psi | 138 kPa</option>
              <option value="3">30 psi | 207 kPa</option>
              <option value="4" selected>50 psi | 345 kPa</option>
            </select>
          </div>

          <div class="fs-ms-primary-reading">
            <span class="fs-ms-reading-label">Gas Capacity</span>
            <div class="fs-ms-reading-value" id="fsGasReading0"></div>
          </div>

          <div class="fs-ms-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1207 <small>kPag</small></span>
                <span class="imperial">175 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-ms-model-card" data-card-index="1">
          <div class="fs-ms-card-top">
            <span class="fs-ms-family">CompressionCommander™</span>
            <div class="fs-ms-model-line">
              <h3>CC835 (015013)</h3>
              <span class="fs-ms-hp-badge">15 HP</span>
            </div>
          </div>

          <div class="fs-ms-pressure-control">
            <div class="fs-ms-pressure-row">
              <label for="fsPressure1">Inlet pressure</label>
            </div>
            <select id="fsPressure1" class="fs-pressure-select" data-card="1">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">10 psi | 69 kPa</option>
              <option value="2">20 psi | 138 kPa</option>
              <option value="3">30 psi | 207 kPa</option>
              <option value="4" selected>50 psi | 345 kPa</option>
            </select>
          </div>

          <div class="fs-ms-primary-reading">
            <span class="fs-ms-reading-label">Gas Capacity</span>
            <div class="fs-ms-reading-value" id="fsGasReading1"></div>
          </div>

          <div class="fs-ms-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">2586 <small>kPag</small></span>
                <span class="imperial">375 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-ms-model-card" data-card-index="2">
          <div class="fs-ms-card-top">
            <span class="fs-ms-family">CompressionCommander™</span>
            <div class="fs-ms-model-line">
              <h3>CC1035 (050035)</h3>
              <span class="fs-ms-hp-badge">50 HP</span>
            </div>
          </div>

          <div class="fs-ms-pressure-control">
            <div class="fs-ms-pressure-row">
              <label for="fsPressure2">Inlet pressure</label>
            </div>
            <select id="fsPressure2" class="fs-pressure-select" data-card="2">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">10 psi | 69 kPa</option>
              <option value="2">20 psi | 138 kPa</option>
              <option value="3">30 psi | 207 kPa</option>
              <option value="4" selected>50 psi | 345 kPa</option>
            </select>
          </div>

          <div class="fs-ms-primary-reading">
            <span class="fs-ms-reading-label">Gas Capacity</span>
            <div class="fs-ms-reading-value" id="fsGasReading2"></div>
          </div>

          <div class="fs-ms-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1724 <small>kPag</small></span>
                <span class="imperial">250 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-ms-model-card" data-card-index="3">
          <div class="fs-ms-card-top">
            <span class="fs-ms-family">CompressionCommander™</span>
            <div class="fs-ms-model-line">
              <h3>CC1235 (050035)</h3>
              <span class="fs-ms-hp-badge">50 HP</span>
            </div>
          </div>

          <div class="fs-ms-pressure-control">
            <div class="fs-ms-pressure-row">
              <label for="fsPressure3">Inlet pressure</label>
            </div>
            <select id="fsPressure3" class="fs-pressure-select" data-card="3">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">10 psi | 69 kPa</option>
              <option value="2">20 psi | 138 kPa</option>
              <option value="3">30 psi | 207 kPa</option>
              <option value="4" selected>50 psi | 345 kPa</option>
            </select>
          </div>

          <div class="fs-ms-primary-reading">
            <span class="fs-ms-reading-label">Gas Capacity</span>
            <div class="fs-ms-reading-value" id="fsGasReading3"></div>
          </div>

          <div class="fs-ms-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1034 <small>kPag</small></span>
                <span class="imperial">150 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-ms-model-card" data-card-index="4">
          <div class="fs-ms-card-top">
            <span class="fs-ms-family">CompressionCommander™</span>
            <div class="fs-ms-model-line">
              <h3>CC1245 (050035)</h3>
              <span class="fs-ms-hp-badge">50 HP</span>
            </div>
          </div>

          <div class="fs-ms-pressure-control">
            <div class="fs-ms-pressure-row">
              <label for="fsPressure4">Inlet pressure</label>
            </div>
            <select id="fsPressure4" class="fs-pressure-select" data-card="4">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">10 psi | 69 kPa</option>
              <option value="2">20 psi | 138 kPa</option>
              <option value="3">30 psi | 207 kPa</option>
              <option value="4" selected>50 psi | 345 kPa</option>
            </select>
          </div>

          <div class="fs-ms-primary-reading">
            <span class="fs-ms-reading-label">Gas Capacity</span>
            <div class="fs-ms-reading-value" id="fsGasReading4"></div>
          </div>

          <div class="fs-ms-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1896 <small>kPag</small></span>
                <span class="imperial">275 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-ms-model-card" data-card-index="5">
          <div class="fs-ms-card-top">
            <span class="fs-ms-family">CompressionCommander™</span>
            <div class="fs-ms-model-line">
              <h3>CC1245 (100060)</h3>
              <span class="fs-ms-hp-badge">100 HP</span>
            </div>
          </div>

          <div class="fs-ms-pressure-control">
            <div class="fs-ms-pressure-row">
              <label for="fsPressure5">Inlet pressure</label>
            </div>
            <select id="fsPressure5" class="fs-pressure-select" data-card="5">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">10 psi | 69 kPa</option>
              <option value="2">20 psi | 138 kPa</option>
              <option value="3">30 psi | 207 kPa</option>
              <option value="4" selected>50 psi | 345 kPa</option>
            </select>
          </div>

          <div class="fs-ms-primary-reading">
            <span class="fs-ms-reading-label">Gas Capacity</span>
            <div class="fs-ms-reading-value" id="fsGasReading5"></div>
          </div>

          <div class="fs-ms-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1896 <small>kPag</small></span>
                <span class="imperial">275 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-ms-model-card" data-card-index="6">
          <div class="fs-ms-card-top">
            <span class="fs-ms-family">CompressionCommander™</span>
            <div class="fs-ms-model-line">
              <h3>CC1645 (100060)</h3>
              <span class="fs-ms-hp-badge">100 HP</span>
            </div>
          </div>

          <div class="fs-ms-pressure-control">
            <div class="fs-ms-pressure-row">
              <label for="fsPressure6">Inlet pressure</label>
            </div>
            <select id="fsPressure6" class="fs-pressure-select" data-card="6">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">10 psi | 69 kPa</option>
              <option value="2">20 psi | 138 kPa</option>
              <option value="3">30 psi | 207 kPa</option>
              <option value="4" selected>50 psi | 345 kPa</option>
            </select>
          </div>

          <div class="fs-ms-primary-reading">
            <span class="fs-ms-reading-label">Gas Capacity</span>
            <div class="fs-ms-reading-value" id="fsGasReading6"></div>
          </div>

          <div class="fs-ms-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1034 <small>kPag</small></span>
                <span class="imperial">150 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-ms-model-card" data-card-index="7">
          <div class="fs-ms-card-top">
            <span class="fs-ms-family">CompressionCommander™</span>
            <div class="fs-ms-model-line">
              <h3>CC2270 (100128)</h3>
              <span class="fs-ms-hp-badge">100 HP</span>
            </div>
          </div>

          <div class="fs-ms-pressure-control">
            <div class="fs-ms-pressure-row">
              <label for="fsPressure7">Inlet pressure</label>
            </div>
            <select id="fsPressure7" class="fs-pressure-select" data-card="7">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">10 psi | 69 kPa</option>
              <option value="2">20 psi | 138 kPa</option>
              <option value="3">30 psi | 207 kPa</option>
              <option value="4" selected>50 psi | 345 kPa</option>
            </select>
          </div>

          <div class="fs-ms-primary-reading">
            <span class="fs-ms-reading-label">Gas Capacity</span>
            <div class="fs-ms-reading-value" id="fsGasReading7"></div>
          </div>

          <div class="fs-ms-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1551 <small>kPag</small></span>
                <span class="imperial">225 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-ms-model-card" data-card-index="8">
          <div class="fs-ms-card-top">
            <span class="fs-ms-family">CompressionCommander™</span>
            <div class="fs-ms-model-line">
              <h3>CC2270 (150128)</h3>
              <span class="fs-ms-hp-badge">150 HP</span>
            </div>
          </div>

          <div class="fs-ms-pressure-control">
            <div class="fs-ms-pressure-row">
              <label for="fsPressure8">Inlet pressure</label>
            </div>
            <select id="fsPressure8" class="fs-pressure-select" data-card="8">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">10 psi | 69 kPa</option>
              <option value="2">20 psi | 138 kPa</option>
              <option value="3">30 psi | 207 kPa</option>
              <option value="4" selected>50 psi | 345 kPa</option>
            </select>
          </div>

          <div class="fs-ms-primary-reading">
            <span class="fs-ms-reading-label">Gas Capacity</span>
            <div class="fs-ms-reading-value" id="fsGasReading8"></div>
          </div>

          <div class="fs-ms-card-specs">
            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1551 <small>kPag</small></span>
                <span class="imperial">225 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>
      </div>

      <style>
        .fs-ms-sizing-notes ol {
          list-style-type: decimal !important;
          padding-left: 24px;
        }

        .fs-ms-sizing-notes ol li::before {
          content: none !important;
        }
      </style>

      <div class="fs-ms-sizing-notes">
        <strong>Engineering notes</strong>
        <ol>
          <li>
            Flow conditions calculated at 15℃ [59℉] inlet pressure and with various components operating at
            100% efficiency. Flow rates may vary based on inlet pressures, gas content, and other factors.
            Max gas rates will be reduced by amount of liquids in total fluid. Contact Fluidstream for gas
            capacity review based on specific liquid rates and operating conditions.
          </li>
          <li>
            Max gas rates and max pressure differentials can be increased by configuring additional unit(s)
            in parallel or in series.
          </li>
          <li>
            Higher horsepower units will yield much higher fluid flow rates at various pressure differentials.
            Please request pump curves to see flow rates at various pressure differentials.
          </li>
        </ol>
      </div>
    </div>

    <script>
      (function () {
        const gasData = [
          [
            '<span class="metric">1.0 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">35 <small>MCF/day</small></span>',
            '<span class="metric">1.3 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">46 <small>MCF/day</small></span>',
            '<span class="metric">1.8 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">64 <small>MCF/day</small></span>',
            '<span class="metric">2.3 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">81 <small>MCF/day</small></span>',
            '<span class="metric">3.4 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">120 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">0.6 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">21 <small>MCF/day</small></span>',
            '<span class="metric">0.7 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">25 <small>MCF/day</small></span>',
            '<span class="metric">1.0 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">35 <small>MCF/day</small></span>',
            '<span class="metric">1.3 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">46 <small>MCF/day</small></span>',
            '<span class="metric">1.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">67 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">1.5 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">53 <small>MCF/day</small></span>',
            '<span class="metric">2.6 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">92 <small>MCF/day</small></span>',
            '<span class="metric">3.6 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">127 <small>MCF/day</small></span>',
            '<span class="metric">4.6 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">162 <small>MCF/day</small></span>',
            '<span class="metric">6.7 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">237 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">3.0 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">106 <small>MCF/day</small></span>',
            '<span class="metric">3.8 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">134 <small>MCF/day</small></span>',
            '<span class="metric">5.3 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">187 <small>MCF/day</small></span>',
            '<span class="metric">6.8 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">240 <small>MCF/day</small></span>',
            '<span class="metric">9.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">350 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">1.8 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">64 <small>MCF/day</small></span>',
            '<span class="metric">2.2 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">78 <small>MCF/day</small></span>',
            '<span class="metric">3.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">109 <small>MCF/day</small></span>',
            '<span class="metric">4.0 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">141 <small>MCF/day</small></span>',
            '<span class="metric">5.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">208 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">3.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">109 <small>MCF/day</small></span>',
            '<span class="metric">3.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">138 <small>MCF/day</small></span>',
            '<span class="metric">5.5 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">194 <small>MCF/day</small></span>',
            '<span class="metric">7.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">251 <small>MCF/day</small></span>',
            '<span class="metric">10.3 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">364 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">5.7 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">201 <small>MCF/day</small></span>',
            '<span class="metric">7.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">251 <small>MCF/day</small></span>',
            '<span class="metric">9.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">350 <small>MCF/day</small></span>',
            '<span class="metric">12.8 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">452 <small>MCF/day</small></span>',
            '<span class="metric">18.5 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">653 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">8.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">357 <small>MCF/day</small></span>',
            '<span class="metric">11.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">449 <small>MCF/day</small></span>',
            '<span class="metric">15.6 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">629 <small>MCF/day</small></span>',
            '<span class="metric">20.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">209 <small>MCF/day</small></span>',
            '<span class="metric">29.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">1,169 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">8.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">357 <small>MCF/day</small></span>',
            '<span class="metric">11.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">449 <small>MCF/day</small></span>',
            '<span class="metric">15.6 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">629 <small>MCF/day</small></span>',
            '<span class="metric">20.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">209 <small>MCF/day</small></span>',
            '<span class="metric">29.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">1,169 <small>MCF/day</small></span>'
          ]
        ];

        function updateCard(index, pressureIndex) {
          const element = document.getElementById('fsGasReading' + index);

          if (!element || !gasData[index]) {
            return;
          }

          element.innerHTML = gasData[index][pressureIndex] || '<span class="empty">—</span>';
        }

        document.querySelectorAll('.fs-pressure-select').forEach(function (select) {
          const cardIndex = Number(select.dataset.card);
          select.value = '4';
          updateCard(cardIndex, Number(select.value));

          select.addEventListener('change', function (event) {
            updateCard(Number(event.target.dataset.card), Number(event.target.value));
          });
        });

        const globalPressure = document.getElementById('fsGlobalPressure');

        if (globalPressure) {
          globalPressure.value = '4';

          globalPressure.addEventListener('change', function (event) {
            const pressureIndex = Number(event.target.value);

            document.querySelectorAll('.fs-pressure-select').forEach(function (select) {
              select.value = String(pressureIndex);
              updateCard(Number(select.dataset.card), pressureIndex);
            });
          });
        }
      })();
    </script>
  </section>

  <section>
    <div class="wrap py-12">
      <div class="case-study">
        <div class="eyebrow2">Field proof</div>
        <h2>Proven in severe multiphase service that is harder than typical casing gas carryover.</h2>
        <p>Fluidstream’s severe multiphase production recovery case study provides relevant proof for casing gas
          applications because it demonstrates stable operation under liquid-heavy conditions more demanding than typical
          casing gas carryover.
        </p>

        <div class="stat-grid">
          <div class="stat">
            <div class="label">Operating Challenge</div>
            <div class="value">Severe</div>
            <div>Variable multiphase production with liquids present continuously rather than only during occasional upset
              conditions.</div>
          </div>
          <div class="stat">
            <div class="label">Surface Simplicity</div>
            <div class="value">No added separation</div>
            <div>Stable operation achieved without adding separation equipment or extra site infrastructure.</div>
          </div>
          <div class="stat">
            <div class="label">Casing Gas Relevance</div>
            <div class="value">High</div>
            <div>Demonstrates performance in conditions more severe than typical casing gas liquid carryover.</div>
          </div>
        </div>

        <blockquote>“Fluidstream’s multiphase compression didn’t just improve performance — it transformed non-producing
          wells into revenue-generating assets, delivering stable operation in severe multiphase conditions without adding
          separation equipment or infrastructure.”</blockquote>
        <div class="quote-src">Field performance proof relevant to the CompressionCommander™ reliability story in casing
          gas service.</div>

        <p>Read the full case study for the operating challenge, installation context, runtime importance, and why proven
          severe multiphase performance supports stronger casing gas reliability expectations.</p>
        <div class="btn-row" style="margin-bottom:0;">
          <a class="btn btn-primary" href="#">Read More</a>
        </div>
      </div>
    </div>
  </section>

  <section id="application-review" class="cta-1">
    <div class="wrap py-12">
      <div class="cta-box">
        <div>
          <h2>Submit your casing gas conditions for a CompressionCommander™ application review.</h2>
          <p>
            If your current system is vulnerable to liquid carryover, scrubber breakthrough, slug-related trips, corrosive
            service, or too much operator intervention, Fluidstream can review your casing gas stream, pressure targets,
            maintenance pain points, and site constraints to identify a lower-maintenance CompressionCommander™
            configuration built for the duty you actually have.
          </p>
        </div>
        <div class="cta-panel interactive-card swipe-left">
          <h3>What to send for review</h3>

          <ul class="space-y-4">
            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Casing gas rate and expected operating range</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Inlet pressure, discharge pressure, and flare or recovery target</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Expected liquids, slugging behavior, and scrubber limitations</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>H₂S, cold-weather, sand, or corrosive-service requirements</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Remote-control needs, maintenance issues, and uptime priorities</span>
            </li>
          </ul>

          <div class="btn-row" style="margin-bottom:0;">
            <a class="btn-1 btn-primary" href="#">Request CompressionCommander™ Review</a>
            <a class="btn-1 btn-secondary-1" href="#specifications">Review Specifications</a>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection