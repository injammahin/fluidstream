@extends('layouts.app')

@section('content')

  <style>
    :root {
      --blue: #0018dc;
      --blue2: #0a35ff;
      --cyan: #15d1ff;
      --ink: #0f172a;
      --muted: #4a5568;
      --line: #d9e6ff;
      --bg: #f7fbff;
      --card: #ffffff;
      --dark: #07124a;
    }

    a {
      color: inherit;
    }

    .wrap {
      max-width: 1200px;
      margin: 0 auto;
    }

    header.hero {
      background: radial-gradient(circle at 78% 22%, rgba(21, 209, 255, .18), transparent 20%), linear-gradient(125deg, rgba(0, 24, 220, .96), rgba(0, 24, 220, .88) 52%, rgb(15 39 223));
      color: #fff;
    }

    .breadcrumbs {
      font-size: 13px;
      letter-spacing: .04em;
      text-transform: uppercase;
      opacity: .82;
      margin-bottom: 18px;
    }

    .eyebrow {
      display: inline-block;
      font-size: 13px;
      letter-spacing: .11em;
      text-transform: uppercase;
      font-weight: 700;
      color: #bfeeff;
      margin-bottom: 14px;
    }

    h1 {
      margin: 0 0 14px;
      font-size: 50px;
      line-height: 1.04;
      max-width: 900px;
      letter-spacing: -.03em;
    }

    .subhead {
      margin: 0 0 20px;
      font-size: 23px;
      line-height: 1.2;
      color: #e5f1ff;
      max-width: 920px;
      font-weight: 700;
    }

    .hero-copy {
      max-width: 860px;
      color: #edf5ff;
      font-size: 18px;
      margin: 0 0 26px;
    }

    .btn-row {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
      margin-bottom: 36px;
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
      transition: .2s ease;
    }

    .btn-1 {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      padding: 14px 20px;
      border-radius: 999px;
      text-decoration: none;
      font-weight: 700;
      border: 1px solid rgb(34, 34, 34);
      transition: .2s ease;
    }

    .btn:hover {
      transform: translateY(-1px);
    }

    .btn-primary {
      background: #fff;
      color: var(--blue);
    }

    .btn-secondary {
      background: transparent;
      color: #fff;
    }

    .btn-secondary-1 {
      background: transparent;
      color: #212121;
    }

    .patent-note {
      margin: 16px 0 16px;
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
      background: #f5f7fb;
      color: #284163;
      border-left: 4px solid var(--blue);
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
    .spec-mobile-card {
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
    .spec-mobile-card>* {
      position: relative;
      z-index: 2;
    }

    .swipe-left:before,
    .hero-card:before,
    .model-card:before,
    .spec-mobile-card:before {
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
    .hero-card:after,
    .model-card:after,
    .spec-mobile-card:after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background-color: #0018dc;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.3s ease;
      z-index: 1;
    }

    .swipe-left:hover:after,
    .hero-card:hover:after,
    .model-card:hover:after,
    .spec-mobile-card:hover:after {
      transform: scaleX(1);
    }

    .swipe-left:hover,
    .hero-card:hover,
    .model-card:hover,
    .spec-mobile-card:hover,
    .blue-fill:hover,
    .cta-panel:hover {
      transform: translateY(-3px);
      border-color: #0018dc !important;
      background: #ffffff;
    }

    .swipe-left:hover:after,
    .hero-card:hover:after,
    .model-card:hover:after,
    .spec-mobile-card:hover:after {
      transform: scaleX(1);
    }

    .swipe-left:hover:after {
      right: 155%;
    }

    .hero-card:hover {
      box-shadow: 0 26px 56px rgba(0, 24, 220, .18);
      border-color: rgba(255, 255, 255, .3);
    }

    .model-card:hover,
    .spec-mobile-card:hover {
      border-color: #b9d0ff;
    }

    .blue-fill:after,
    .cta-panel:after,
    .highlight-box:after {
      content: "";
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 82% 18%, rgba(21, 209, 255, .24), transparent 30%);
      opacity: 0;
      transition: opacity .32s ease;
      z-index: 1;
      pointer-events: none;
    }

    .blue-fill:hover,
    .highlight-box:hover {
      box-shadow: 0 24px 58px rgba(0, 24, 220, .18);
      border-color: #0018dc;
    }

    .blue-fill:hover h3,
    .blue-fill:hover p,
    .blue-fill:hover li,
    .blue-fill:hover strong,
    .highlight-box:hover h3,
    .highlight-box:hover p,
    .highlight-box:hover li,
    .highlight-box:hover strong {
      color: #fff !important;
    }

    .blue-fill:hover .num {
      background: rgba(255, 255, 255, .14);
      color: #fff;
    }

    .highlight-box:hover a {
      color: #fff !important;
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
      border-radius: 12px;
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
      gap: 12px;
    }

    .model-metrics div {
      padding-top: 12px;
      border-top: 1px solid #e7efff;
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
      min-width: 1200px;
      font-size: 14px;
    }

    .spec-table-enhanced thead th {
      position: sticky;
      top: 0;
      z-index: 2;
      background: #eef5ff;
      color: #0b1b6f;
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
      background: #fbfdff;
    }

    .spec-table-enhanced tbody tr:hover {
      background: #f5f9ff;
    }

    .spec-col {
      min-width: 240px;
      font-weight: 700;
      color: #232325;
      background: linear-gradient(180deg, #ffffff, #fbfdff);
    }

    .cond-col {
      min-width: 170px;
      color: #425066;
      font-weight: 700;
    }

    .spec-desktop {
      display: block;
    }

    .spec-mobile {
      display: none;
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

    .spec-mobile-grid span,
    .gas-rate-title {
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

    .gas-rate-block {
      border-top: 1px solid #e7efff;
      padding-top: 16px;
    }

    .gas-rate-row {
      display: flex;
      justify-content: space-between;
      gap: 16px;
      align-items: flex-start;
      padding: 10px 0;
      border-bottom: 1px solid #edf3ff;
    }

    .gas-rate-row span {
      color: #4a5568;
    }

    .gas-rate-row strong {
      color: #232325;
    }

    .hero-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
    }

    .hero-card-1 {
      /* background: rgba(255, 255, 255, .11); */
      border: 1px solid rgba(255, 255, 255, .14);
      border-radius: 12px;
      padding: 20px;
      min-height: 164px;
      /* backdrop-filter: blur(7px); */
    }

    .hero-card-1 h3 {
      margin: 0 0 8px;
      font-size: 20px;
      line-height: 1.15;
      color: #fff;
    }

    .hero-card-1 p {
      margin: 0;
      color: #e8f4ff;
      font-size: 15px;
    }

    h2 {
      margin: 0 0 16px;
      font-size: clamp(1.9rem, 3vw, 3rem);
      line-height: 1.05;
      letter-spacing: -.04em;
      max-width: 23ch;
      color: #1f1f21;
    }

    .lead {
      margin-bottom: 20px;
      max-width: 59ch;
      font-size: 16px;
      line-height: 1.75;
      color: #424f5d;
    }

    .grid-3 {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 18px;
    }

    .grid-4 {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px;
    }

    .card {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 24px;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
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
      margin-bottom: 14px;
    }

    .card h3 {
      margin: 0 0 10px;
      font-size: 24px;
      line-height: 1.14;
      color: #232325;
    }

    .card p {
      margin: 0;
      color: var(--muted);
    }

    .split {
      display: grid;
      grid-template-columns: 1.05fr .95fr;
      gap: 26px;
      align-items: start;
    }

    .feature-stack {
      display: grid;
      gap: 18px;
    }

    .feature {
      background: #fff;
      border: 1px solid var(--line);
      border-radius: 7px;
      padding: 22px;
    }

    .feature h3 {
      margin: 0 0 10px;
      color: #232325;
      font-size: 24px;
      line-height: 1.14;
    }

    .feature p {
      margin: 0;
      color: var(--muted);
    }

    .highlight-box-1 {
      background: #f6f7fb;
      border: 1px solid #d8e8ff;
      border-radius: 9px;
      padding: 26px;
      height: 100%;
    }

    .highlight-box-1 h3 {
      margin: 0 0 12px;
      font-size: 28px;
      color: #0b1b6f;
      line-height: 1.12;
    }

    .highlight-box-1 p {
      margin: 0 0 14px;
      color: #425066;
    }

    .bullet {
      margin: 0;
      padding-left: 20px;
      color: #243042;
    }

    .bullet li {
      margin: 0 0 10px;
    }

    .band {
      background: #f6f7fb;
      border-top: 1px solid #dfe9ff;
      border-bottom: 1px solid #dfe9ff;
    }

    .case-study {
      background: linear-gradient(130deg, #091553, #0018dc 58%, #0a7ad8);
      color: #fff;
      border-radius: 12px;
      padding: 34px;
      box-shadow: 0 24px 54px rgba(0, 24, 220, .24);
    }

    .case-study .eyebrow2 {
      color: #bdeeff;
      text-transform: uppercase;
      letter-spacing: .1em;
      font-weight: 700;
      font-size: 12px;
      margin-bottom: 10px;
    }

    .case-study h2 {
      color: #fff;
      font-size: 40px;
      margin-bottom: 16px;
    }

    .case-study p {
      max-width: 62ch;
      color: #ebf4ff;
      margin: 0 0 16px;
      font-size: 17px;
    }

    .stat-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 16px;
      margin: 24px 0;
    }

    .stat {
      background: rgba(255, 255, 255, .1);
      border: 1px solid rgba(255, 255, 255, .14);
      border-radius: 7px;
      padding: 22px 20px;
    }

    .stat .label {
      font-size: 12px;
      letter-spacing: .1em;
      text-transform: uppercase;
      color: #bfeeff;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .stat .value {
      font-size: 34px;
      line-height: 1.02;
      font-weight: 800;
      margin-bottom: 8px;
    }

    blockquote {
      margin: 22px 0 8px;
      padding: 0 0 0 20px;
      border-left: 3px solid rgba(255, 255, 255, .28);
      color: #fff;
      font-size: 22px;
      line-height: 1.35;
    }

    .quote-src {
      color: #cfe7ff;
      font-weight: 700;
      margin-bottom: 18px;
    }

    .spec-wrap {
      overflow: auto;
      border: 1px solid var(--line);
      border-radius: 22px;
      box-shadow: 0 16px 40px rgba(13, 32, 84, .05);
      background: #fff;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      min-width: 1020px;
      font-size: 14px;
    }

    th,
    td {
      padding: 14px 12px;
      border-bottom: 1px solid #e8efff;
      text-align: left;
      vertical-align: top;
    }

    thead th {
      background: #eef5ff;
      color: #0b1b6f;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    tbody tr:nth-child(even) {
      background: #fbfdff;
    }

    .notes {
      margin-top: 18px;
      color: var(--muted);
      font-size: 15px;
    }

    .cta {
      background: #fff;
      color: #fff;
    }

    .cta-box {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 24px;
      align-items: center;
    }

    .cta h2 {
      margin-bottom: 14px;
    }

    .cta p {
      margin: 0;
      color: #252525 !important;
      font-size: 18px;
      max-width: 780px;
    }

    .cta-panel {
      background: rgba(255, 255, 255, .1);
      border: 1px solid rgb(47 47 47 / 14%);
      border-radius: 7px;
      padding: 24px;
    }

    .cta-panel h3 {
      margin: 0 0 10px;
      color: #252525 !important;
      font-size: 24px;
    }

    .cta-panel ul {
      margin: 0 0 18px;
      padding-left: 20px;
      color: #252525 !important;
    }

    /* =========================================
                         HERO SECTION FIXED STYLE
                      ========================================= */

    header.hero {
      position: relative !important;
      isolation: isolate;
      overflow: hidden;
      min-height: calc(100vh - 108px);
      display: flex;
      align-items: stretch;
      background: #07111f !important;
      color: #ffffff;
      padding: 0 !important;
    }

    header.hero::before {
      content: "";
      position: absolute;
      inset: 0;
      z-index: -3;
      background-image: url("/img/hero/Vermilion.png");
      background-size: cover;
      background-position: center center;
      background-repeat: no-repeat;
      transform: scale(1.02);
      transform-origin: center;
    }

    header.hero::after {
      content: "";
      position: absolute;
      inset: 0;
      z-index: -2;
      pointer-events: none;
      background:
        linear-gradient(90deg,
          rgba(2, 6, 23, 0.96) 0%,
          rgba(2, 6, 23, 0.88) 22%,
          rgba(2, 6, 23, 0.64) 44%,
          rgba(2, 6, 23, 0.28) 70%,
          rgba(2, 6, 23, 0.18) 100%),
        linear-gradient(180deg,
          rgba(2, 6, 23, 0.18) 0%,
          rgba(2, 6, 23, 0.32) 100%);
    }

    header.hero>.wrap {
      position: relative;
      z-index: 2;
      width: 1200px;
      max-width: none;
      min-height: calc(100vh - 108px);
      display: flex;
      align-items: center;
      justify-content: flex-start;
      padding-top: 72px !important;
      padding-bottom: 72px !important;
    }

    .fs-hero-content {
      width: min(900px, 100%);
    }

    header.hero h1 {
      margin: 0 0 22px;
      max-width: 620px;
      color: #ffffff !important;
      font-size: clamp(58px, 6.4vw, 108px);
      line-height: 0.92;
      letter-spacing: -0.075em;
      font-weight: 900;
    }

    header.hero .hero-copy {
      max-width: 640px;
      margin: 0 0 24px;
      color: rgba(255, 255, 255, 0.88) !important;
      font-size: clamp(22px, 2vw, 29px);
      line-height: 1.28;
      letter-spacing: -0.035em;
      font-weight: 800;
    }

    header.hero .patent-note {
      max-width: 610px;
      margin: 0 0 26px;
      padding: 0;
      border-left: 0;
      border-radius: 0;
      background: transparent;
      color: rgba(255, 255, 255, 0.70);
      font-size: 17px;
      line-height: 1.45;
      font-weight: 500;
    }

    header.hero .btn-row {
      gap: 16px;
      margin-bottom: 42px;
    }

    header.hero .btn {
      min-height: 56px;
      padding: 0 30px;
      border-radius: 999px;
      font-size: 16px;
      font-weight: 900;
    }

    header.hero .btn-primary {
      background: #ffffff;
      color: #0f172a;
      /* border-color: #1028ea; */
    }

    header.hero .btn-primary:hover {
      background: #0018dc;
      border-color: #0018dc;
    }

    header.hero .btn-secondary {
      background: rgba(255, 255, 255, 0.12);
      color: #ffffff;
      border-color: rgba(255, 255, 255, 0.30);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
    }

    header.hero .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.18);
    }

    header.hero .hero-grid {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 16px;
      width: min(900px, 100%);
    }

    header.hero .hero-card-1 {
      position: relative;
      overflow: hidden;
      min-height: 190px;
      padding: 22px 22px 20px;
      border-radius: 6px;
      /* background: rgb(3 13 40 / 0%) !important; */
      border: 1px solid rgba(172, 197, 255, 0.26) !important;
      box-shadow: 0 18px 42px rgba(0, 0, 0, 0.20);
      /* backdrop-filter: blur(12px); */
      /* -webkit-backdrop-filter: blur(12px); */
      transition: transform 0.28s ease, border-color 0.28s ease, background 0.28s ease, box-shadow 0.28s ease;
    }

    header.hero .hero-card-1:hover {
      transform: translateY(-5px);
      /* border-color: rgba(21, 209, 255, 0.42) !important; */
      background: rgb(3 13 40 / 0%) !important;
      /* box-shadow: 0 26px 58px rgba(0, 24, 220, 0.20); */
    }

    header.hero .hero-card-icon {
      width: 42px;
      height: 42px;
      margin-bottom: 18px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 999px;
      background: #9aa8ff17;
      color: #ffffff;
    }

    header.hero .hero-card-icon svg {
      width: 20px;
      height: 20px;
    }

    header.hero .hero-card-1 h3 {
      margin: 0 0 10px;
      color: #ffffff !important;
      font-size: 23px;
      line-height: 1.02;
      letter-spacing: -0.045em;
      font-weight: 900;
    }

    header.hero .hero-card-1 p {
      margin: 0;
      color: rgba(232, 244, 255, 0.80) !important;
      font-size: 16px;
      line-height: 1.36;
      font-weight: 800;
    }

    @media (max-width: 1080px) {

      .hero-grid,
      .grid-3,
      .grid-4,
      .split,
      .stat-grid,
      .cta-box,
      .model-card-grid {
        grid-template-columns: 1fr 1fr;
      }

      header.hero {
        min-height: auto;
      }

      header.hero>.wrap {
        width: 1200px;
        min-height: auto;
        padding-top: 76px !important;
        padding-bottom: 64px !important;
      }

      .fs-hero-content {
        width: 100%;
      }

      header.hero h1 {
        max-width: 760px;
      }

      header.hero .hero-copy,
      header.hero .patent-note {
        max-width: 720px;
      }

      header.hero .hero-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        width: 100%;
      }
    }

    @media (max-width: 760px) {
      .spec-desktop {
        display: none;
      }

      .spec-mobile {
        display: block;
      }

      .model-card-grid {
        grid-template-columns: 1fr;
      }

      .spec-mobile-grid {
        grid-template-columns: 1fr 1fr;
      }

      .wrap {
        padding: 0 18px;
      }

      h2 {
        font-size: 31px;
      }

      .hero-grid,
      .grid-3,
      .grid-4,
      .split,
      .stat-grid,
      .cta-box {
        grid-template-columns: 1fr;
      }

      .case-study h2 {
        font-size: 31px;
      }

      header.hero {
        min-height: auto;
        padding: 0 !important;
      }

      header.hero::before {
        background-position: center center;
        transform: scale(1.04);
      }

      header.hero::after {
        background:
          linear-gradient(180deg,
            rgba(2, 6, 23, 0.94) 0%,
            rgba(2, 6, 23, 0.86) 46%,
            rgba(0, 24, 220, 0.62) 100%);
      }

      header.hero>.wrap {
        width: min(100% - 30px, 1200px);
        min-height: auto;
        padding-top: 58px !important;
        padding-bottom: 46px !important;
      }

      header.hero h1 {
        max-width: 100%;
        margin-bottom: 18px;
        font-size: clamp(44px, 15vw, 64px);
        line-height: 0.94;
      }

      header.hero .hero-copy {
        font-size: 20px;
        line-height: 1.35;
      }

      header.hero .patent-note {
        font-size: 15px;
      }

      header.hero .btn-row {
        display: grid;
        grid-template-columns: 1fr;
        margin-bottom: 30px;
      }

      header.hero .btn {
        width: 100%;
      }

      header.hero .hero-grid {
        grid-template-columns: 1fr;
      }

      header.hero .hero-card-1 {
        min-height: auto;
      }
    }
  </style>

  <header class="hero">
    <div class="wrap fs-hero-wrap">
      <div class="fs-hero-content">
        <h1>Move mixed flow. Lower pressure.</h1>

        <p class="hero-copy">
          Compress gas, oil, water, and condensate together to reduce backpressure and support production without gas-only
          separation first.
        </p>

        <div class="patent-note">
          Supported by patented liquid-influenced compression behavior, including US11098709B2.
        </div>

        <div class="btn-row mt-5">
          <a class="btn btn-primary" href="#specifications">View specifications</a>
          <a class="btn btn-secondary" href="#technology-benefits">See technology benefits</a>
        </div>

        <div class="hero-grid">
          <div class="hero-card-1">
            <div class="hero-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m0 0 5-5m-5 5-5-5" />
              </svg>
            </div>

            <h3>Lower backpressure</h3>
            <p>Improve inflow and production continuity.</p>
          </div>

          <div class="hero-card-1">
            <div class="hero-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 12c2.5-4 7.5 4 10 0" />
              </svg>
            </div>

            <h3>Untreated flow</h3>
            <p>Move gas and liquids in one stream.</p>
          </div>

          <div class="hero-card-1">
            <div class="hero-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7" />
              </svg>
            </div>

            <h3>Less equipment</h3>
            <p>Reduce separator and scrubber dependency.</p>
          </div>

          <div class="hero-card-1">
            <div class="hero-card-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 3v18M5.64 5.64l12.72 12.72M3 12h18M5.64 18.36 18.36 5.64" />
              </svg>
            </div>

            <h3>Field-ready</h3>
            <p>Built for slugs, solids, liquids, and winter duty.</p>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="wrap py-12">

      <div class="kicker mb-2">Built for reality</div>
      <h2>Designed for mixed-phase, unstable field conditions.</h2>
      <p class="lead">
        MultiphaseCommander™ is built for gas streams with liquids present rather than dry-gas assumptions. It combines
        true multiphase duty, sealed gland protection, full piston tracking, autonomous upset-condition response, and
        lower-maintenance field performance into one production-focused package.
      </p>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>True multiphase duty</h3>
          <p>Positioned for systems where liquids are part of normal operation, not merely an upset to be removed before
            the equipment can work reliably.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">02</div>
          <h3>Technology-backed control</h3>
          <p>Strengthened by Fluidstream features such as liquid handling inside compression, gland sealing with wear
            awareness, piston tracking, and autonomous operating logic.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">03</div>
          <h3>Field-ready durability</h3>
          <p>Better aligned with difficult duty where variable flow, slugs, solids, and changing conditions increase
            maintenance and instability in conventional systems.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">

      <div class="kicker mb-2">The challenge</div>
      <h2>Boosting production when gas and liquids move together.</h2>
      <p class="lead">
        In real production systems, gas rarely moves alone. Liquids, unstable flow, and rising backpressure create a
        surface-duty mismatch that conventional gas-only boosters were not designed to solve.
      </p>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>Backpressure limits production</h3>
          <p>As reservoir energy declines and gathering pressure rises, wells struggle to overcome downstream resistance
            and production performance falls away.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">02</div>
          <h3>Mixed-phase flow complicates boosting</h3>
          <p>Gas, oil, water, and condensate move together, creating an operating duty that is difficult for conventional
            gas-only equipment to handle reliably.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">03</div>
          <h3>Extra site equipment adds cost</h3>
          <p>Separators, scrubbers, tanks, flares, and added controls increase footprint, complexity, maintenance
            exposure, and total installed cost.</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">

      <div class="kicker mb-2">How MultiphaseCommander™ solves it</div>
      <h2>Multiphase boosting that works on the stream you actually have.</h2>
      <p class="lead">
        MultiphaseCommander™ is a multiphase booster and transfer solution that boosts the untreated stream directly,
        lowers backpressure, and keeps gas and liquids moving together toward downstream handling or centralized
        processing.
      </p>
      <div class="patent-note light mb-5">
        This liquid-aware boosting approach is reinforced by
        <a href="/patented-technology#us11098709b2">US11098709B2</a>, which addresses compression response when liquid is
        detected in the chamber.
      </div>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <div class="num">01</div>
          <h3>Boost the full multiphase stream</h3>
          <p>Instead of forcing complete wellsite separation before useful work can be done, MultiphaseCommander™ is
            designed to work on the combined production stream.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">02</div>
          <h3>Reduce wellhead and gathering pressure</h3>
          <p>Lower backpressure can improve inflow, help production stability, and support stronger upstream operating
            conditions in low-pressure and declining systems.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <div class="num">03</div>
          <h3>Support centralized processing strategies</h3>
          <p>By moving untreated multiphase flow downstream, MultiphaseCommander™ supports field architectures that
            consolidate separation and treatment at central sites.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="band">
    <div class="wrap py-12">

      <div class="kicker mb-2">Production impact</div>
      <h2>Why this matters to production performance.</h2>
      <p class="lead">
        MultiphaseCommander™ is more than surface equipment. It is a production tool that improves the conditions the well
        and gathering system operate against.
      </p>
      <div class="grid-4">
        <div class="card interactive-card swipe-left">
          <h3>Improved inflow potential</h3>
          <p>Lowering flowing wellhead and gathering pressure can improve production continuity and help low-pressure
            systems perform in a more favorable operating window.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Better artificial-lift conditions</h3>
          <p>Where artificial lift is already in use, lower backpressure can help create better intake and operating
            conditions upstream.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>More stable surface behavior</h3>
          <p>Matching the equipment to the actual mixed-phase process reduces the operating mismatch that often drives
            instability and unnecessary support equipment.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Simpler field architecture</h3>
          <p>Moving more of the untreated stream downstream can support leaner pad layouts and reduce the amount of
            handling equipment installed at each site.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="technology-benefits" class="technology-benefits-section">
    <div class="wrap py-12">

      <div class="kicker mb-2">Technology benefits</div>

      <h2>Built on Fluidstream multiphase technology.</h2>

      <p class="lead">
        MultiphaseCommander™ is built on Fluidstream’s core technology platform: direct liquid handling inside
        compression, stronger sealing and wear awareness, better control through upset conditions, and lower-maintenance
        operation in real field service.
      </p>

      {{-- 6 equal cards: 3 columns x 2 rows --}}
      <div class="technology-benefits-grid">
        <div class="technology-benefit-card">
          <h3>Liquid handling inside compression</h3>
          <p>
            Fluidstream technology is built to safely manage incompressible liquids within the compression chamber,
            which is fundamental to true multiphase service and directly supports applications where gas has liquids
            present.
          </p>

          {{-- <div class="technology-benefit-note">
            Patent reference:
            <a href="/patented-technology#us11098709b2">US11098709B2</a>
            supports this liquid-aware compression methodology within MultiphaseCommander™.
          </div> --}}
        </div>

        <div class="technology-benefit-card">
          <h3>Sealed gland protection with wear awareness</h3>
          <p>
            Advanced gland sealing and electronic seal wear detection support safer, more controlled multiphase
            operation while helping operators identify service needs earlier and reduce reactive maintenance.
          </p>
        </div>

        <div class="technology-benefit-card">
          <h3>Alignment and life extension</h3>
          <p>
            The platform is designed to maintain alignment in key stress and wear areas, supporting longer seal life,
            longer component life, and more dependable field performance.
          </p>
        </div>

        <div class="technology-benefit-card">
          <h3>Piston tracking and smarter control</h3>
          <p>
            Piston-location awareness helps the system respond to slugs, solids buildup, ice risk, and other changing
            operating conditions with better control confidence in unstable flow.
          </p>
        </div>

        <div class="technology-benefit-card">
          <h3>Autonomous upset-condition response</h3>
          <p>
            Autonomous control logic is designed to keep operating through multiphase and gas-only upset conditions
            with less operator intervention and a lower-touch maintenance profile.
          </p>
        </div>

        <div class="technology-benefit-card">
          <h3>Field-ready hard-service flexibility</h3>
          <p>
            The technology platform supports electric and gas-drive configurations, plus sealing approaches optimized
            for difficult services such as H₂S-bearing and sand-bearing applications.
          </p>
        </div>
      </div>

      {{-- Big bottom card --}}
      <div class="technology-comparison-card">
        <div class="technology-comparison-copy">
          <h3>Conventional systems vs. MultiphaseCommander™</h3>

          <p>
            Conventional gas-only systems are usually strongest when the field delivers stable, dry gas and low
            variability. MultiphaseCommander™ is positioned for a different duty: mixed-phase streams, increasing
            backpressure, unstable flow, and the need to keep gas and liquids moving together.
          </p>
        </div>

        <div class="technology-comparison-list">
          <ul>
            <li>
              <strong>Conventional gas-only boosters:</strong>
              more sensitive to liquid carryover, often rely on extra site equipment, and can become maintenance-heavy
              when forced into mixed-phase service.
            </li>

            <li>
              <strong>MultiphaseCommander™:</strong>
              designed for gas streams with liquids present, supports multiphase boosting and transfer directly, and
              reduces dependence on added wellsite handling equipment in suitable applications.
            </li>

            <li>
              <strong>Conventional separation-heavy layouts:</strong>
              more footprint, more interfaces, more pressure drop, and more equipment to maintain.
            </li>

            <li>
              <strong>MultiphaseCommander™ approach:</strong>
              lower backpressure, move untreated flow, and support centralized processing or leaner site architecture
              where it makes operational and economic sense.
            </li>
          </ul>

          <div class="technology-comparison-links">
            <a href="{{ url('/technology') }}">View technology page →</a>
            <a href="{{ url('/patented-technology') }}">View patented technology →</a>
          </div>
        </div>
      </div>

    </div>
  </section>
  <style>
    /* ================================
                                                   TECHNOLOGY BENEFITS 3x2 LAYOUT
                                                ================================ */

    .technology-benefits-section {
      background: #ffffff;
    }

    .technology-benefits-section .lead {
      max-width: 760px;
    }

    .technology-benefits-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      grid-auto-rows: 1fr;
      gap: 18px;
      margin-top: 34px;
      align-items: stretch;
    }

    .technology-benefit-card {
      position: relative;
      overflow: hidden;
      /* min-height: 285px; */
      height: 100%;
      display: flex;
      flex-direction: column;
      padding: 24px 24px 22px;
      border: 1px solid #d9e6ff;
      border-radius: 7px;
      background: #ffffff;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
      transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease,
        background .25s ease;
    }

    .technology-benefit-card::after {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      height: 4px;
      background: #0018dc;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform .25s cubic-bezier(.22, .61, .36, 1);
    }

    .technology-benefit-card:hover {
      transform: translateY(-4px);
      border-color: #0018dc;
      /* box-shadow: 0 24px 54px rgba(0, 24, 220, .14); */
      background: #ffffff;
    }

    .technology-benefit-card:hover::after {
      transform: scaleX(1);
    }

    .technology-benefit-card h3 {
      margin: 0 0 12px;
      color: #232325;
      font-size: 23px;
      line-height: 1.12;
      letter-spacing: -.035em;
      font-weight: 500;
    }

    .technology-benefit-card p {
      margin: 0;
      color: #4a5568;
      font-size: 16px;
      line-height: 1.62;
    }

    .technology-benefit-note {
      margin-top: auto;
      padding: 14px 15px;
      border-left: 4px solid #0018dc;
      border-radius: 0 7px 7px 0;
      background: #f5f7fb;
      color: #284163;
      font-size: 14px;
      line-height: 1.52;
    }

    .technology-benefit-note a {
      color: #0018dc;
      font-weight: 800;
      text-decoration: underline;
      text-underline-offset: 2px;
    }

    /* Bottom comparison card */
    .technology-comparison-card {
      display: grid;
      grid-template-columns: minmax(0, .9fr) minmax(0, 1.1fr);
      gap: 42px;
      align-items: start;
      margin-top: 26px;
      padding: 42px 46px;
      border: 1px solid #d9e6ff;
      border-radius: 7px;
      background: #f6f7fb;
      box-shadow: 0 18px 44px rgba(13, 32, 84, .06);
    }

    .technology-comparison-copy h3 {
      margin: 0 0 18px;
      color: #0a1c4d;
      font-size: clamp(24px, 2.6vw, 45px);
      line-height: .98;
      letter-spacing: -.055em;
      font-weight: 500;
    }

    .technology-comparison-copy p {
      margin: 0;
      color: #52667a;
      font-size: 17px;
      line-height: 1.62;
    }

    .technology-comparison-list ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 16px;
    }

    .technology-comparison-list li {
      position: relative;
      padding-left: 34px;
      color: #334155;
      font-size: 16px;
      line-height: 1.65;
    }

    .technology-comparison-list li::before {
      content: "";
      position: absolute;
      left: 0;
      top: 7px;
      width: 20px;
      height: 14px;
      background-repeat: no-repeat;
      background-size: 20px 14px;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='14' viewBox='0 0 20 14' fill='none'%3E%3Cpath d='M1 7h15' stroke='%230018dc' stroke-width='2' stroke-linecap='round'/%3E%3Cpath d='M11 1.5L17 7l-6 5.5' stroke='%230018dc' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
    }

    .technology-comparison-list strong {
      color: #0f172a;
      font-weight: 800;
    }

    .technology-comparison-links {
      display: flex;
      flex-wrap: wrap;
      gap: 18px;
      margin-top: 24px;
      justify-content: end;
    }

    .technology-comparison-links a {
      color: #0018dc;
      font-size: 16px;
      font-weight: 800;
      text-decoration: none;
    }

    .technology-comparison-links a:hover {
      text-decoration: underline;
      text-underline-offset: 3px;
    }

    /* Responsive */
    @media (max-width: 1100px) {
      .technology-benefits-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }

      .technology-comparison-card {
        grid-template-columns: 1fr;
        gap: 28px;
        padding: 34px;
      }
    }

    @media (max-width: 700px) {
      .technology-benefits-grid {
        grid-template-columns: 1fr;
      }

      .technology-benefit-card {
        min-height: auto;
        padding: 22px 20px;
        border-radius: 12px;
      }

      .technology-benefit-card h3 {
        font-size: 22px;
      }

      .technology-comparison-card {
        padding: 26px 22px;
        border-radius: 12px;
      }

      .technology-comparison-copy h3 {
        font-size: 34px;
      }

      .technology-comparison-copy p {
        font-size: 17px;
      }

      .technology-comparison-links {
        flex-direction: column;
        gap: 10px;
      }
    }
  </style>
  <section class="band">
    <div class="wrap py-12">

      <div class="kicker mb-2">The Fluidstream advantage</div>
      <h2>Specific reasons to choose MultiphaseCommander™.</h2>
      <p class="lead">
        MultiphaseCommander™ combines true multiphase boosting, facility simplification potential, strong control
        confidence in unstable flow, and suitability for harder-service environments into one product-level value case.
      </p>
      <div class="grid-4">
        <div class="card interactive-card swipe-left">
          <h3>True multiphase boosting and transfer</h3>
          <p>Positioned for systems where liquids are part of the normal operating condition, not just something to remove
            before the equipment can work reliably.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Facility simplification potential</h3>
          <p>Supports strategies that can reduce dependence on site-level separators, tanks, flares, and other supporting
            equipment in suitable applications.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Control confidence in unstable flow</h3>
          <p>Piston tracking and autonomous control logic create a stronger fit for changing field conditions, slugging
            behavior, and upset scenarios.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Built for hard-service environments</h3>
          <p>The listed product family supports H₂S handling, cold-weather startup, autonomous control, and remote
            interface capability across the model range.</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">

      <div class="kicker mb-2">Applications</div>
      <h2>Applications for MultiphaseCommander™.</h2>
      <p class="lead">
        MultiphaseCommander™ is suited to field problems where gas definitely has liquids present and where lower
        backpressure, untreated-flow transfer, and simpler surface architecture can improve operations.
      </p>
      <div class="grid-3">
        <div class="card interactive-card swipe-left">
          <h3>Multiwell gathering systems</h3>
          <p>Boost and transfer the combined stream from multiple wells toward centralized separation and processing.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Liquid-loaded gas production</h3>
          <p>Support systems where gas production is accompanied by oil, water, or condensate and dry-gas assumptions do
            not hold.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Artificial-lift support</h3>
          <p>Useful where reducing backpressure can improve the operating conditions of upstream lift systems.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Low-pressure reservoirs</h3>
          <p>Applicable where declining reservoir pressure is no longer enough to overcome gathering-system resistance on
            its own.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Pad and cluster development</h3>
          <p>Support surface strategies focused on a reduced footprint and more centralized handling.</p>
        </div>
        <div class="card interactive-card swipe-left">
          <h3>Unstable and slugging systems</h3>
          <p>Better aligned with pipelines and gathering lines that see intermittent or non-ideal multiphase behavior.</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap py-12">

      <div class="case-study">
        <div class="eyebrow2">Case Study Snapshot</div>
        <h2>From shut-in wells to more than C$1.5 million/year in incremental revenue.</h2>
        <p>In Alberta, Canada, Fluidstream’s MultiphaseCommander™ helped revive two liquid-loaded wells that could no
          longer overcome rising pipeline pressure. The result was restored production, no added separation equipment, and
          dependable operation under highly variable multiphase conditions.</p>

        <div class="stat-grid">
          <div class="stat">
            <div class="label">Gas Production</div>
            <div class="value">10e3 m³/d</div>
            <div>Combined gas production restored across both wells after installation.</div>
          </div>
          <div class="stat">
            <div class="label">Condensate</div>
            <div class="value">5 m³/d</div>
            <div>Daily condensate production recovered without added separation infrastructure.</div>
          </div>
          <div class="stat">
            <div class="label">Revenue Impact</div>
            <div class="value">C$1.5M+</div>
            <div>Estimated annual incremental revenue based on April 2026 commodity pricing.</div>
          </div>
        </div>

        <blockquote>“Fluidstream’s MultiphaseCommander didn’t just improve performance—it transformed two shut-in wells
          into revenue-generating assets. We went from zero production to more than $1.5 million per year in incremental
          revenue, without adding separation equipment or extra surface infrastructure.”</blockquote>
        <div class="quote-src">Production Engineer, Western Canadian Oil &amp; Gas Producer</div>

        <p>Read the full case study for the operating challenge, deployment details, variable-flow performance, and the
          broader pad-level opportunity identified by the producer.</p>
        <div class="btn-row" style="margin-bottom:0;">
          <a class="btn btn-primary" href="#">Read More</a>
        </div>
      </div>
    </div>
  </section>


  <section id="specifications" class="fs-mpc-spec-section">
    <style>
      .fs-mpc-spec-section {
        --mpc-blue: #0018dc;
        --mpc-cyan: #15d1ff;
        --mpc-ink: #071126;
        --mpc-text: #19243a;
        --mpc-muted: #647086;
        --mpc-line: #dfe6f1;
        --mpc-soft: #f5f7fb;
        --mpc-white: #ffffff;
        background: var(--mpc-soft);
        padding: 66px 0;
        color: var(--mpc-text);
      }

      .fs-mpc-spec-section,
      .fs-mpc-spec-section * {
        box-sizing: border-box;
      }

      .fs-mpc-wrap {
        width: min(1200px, calc(100% - 44px));
        margin: 0 auto;
      }

      .fs-mpc-section-head {
        /* display: grid; */
        grid-template-columns: 260px 1fr;
        gap: 44px;
        align-items: start;
        margin-bottom: 28px;
      }

      .fs-mpc-rail {
        /* border-top: 3px solid var(--mpc-blue); */
        padding-top: 14px;
        color: var(--mpc-blue);
        font-size: 13px;
        font-weight: 950;
        letter-spacing: .1em;
        text-transform: uppercase;
      }

      /* .fs-mpc-section-head h2 {
                                                                              font-size: clamp(30px, 3.2vw, 46px);
                                                                              line-height: 1.02;
                                                                              margin: 0 0 14px;
                                                                              letter-spacing: -.035em;
                                                                              color: var(--mpc-ink);
                                                                            } */

      .fs-mpc-lead {
        font-size: 17px;
        color: #56647a;
        max-width: 860px;
        margin: 0;
        line-height: 1.65;
      }

      .fs-mpc-spec-note {
        margin: 14px 0 0;
        font-size: 14px;
        color: var(--mpc-muted);
        font-weight: 700;
        line-height: 1.6;
      }

      .fs-mpc-global-control {
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

      .fs-mpc-global-control strong {
        display: inline;
        color: var(--mpc-ink);
        font-size: 15px;
        font-weight: 950;
        white-space: nowrap;
      }

      .fs-mpc-spec-section select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: #ffffff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='%230018dc' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 14px center;
        border: 1px solid #cfd8ea;
        border-radius: 999px;
        color: var(--mpc-ink);
        font-size: 15px !important;
        line-height: 1.25 !important;
        font-weight: 800 !important;
        padding: 10px 44px 10px 15px;
        min-width: 220px;
        outline: none;
        cursor: pointer;
        transition: border-color .24s ease, box-shadow .24s ease;
      }

      .fs-mpc-spec-section select option {
        font-size: 15px !important;
        line-height: 1.35 !important;
        font-weight: 500 !important;
        color: #071126;
        background: #ffffff;
      }

      .fs-mpc-spec-section select:focus {
        border-color: var(--mpc-blue);
        box-shadow: 0 0 0 4px rgba(0, 24, 220, .08);
      }

      .fs-mpc-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
      }

      .fs-mpc-model-card {
        position: relative;
        isolation: isolate;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid var(--mpc-line);
        border-radius: 7px;
        box-shadow: 0 14px 36px rgba(7, 17, 38, .065);
        transition: transform .24s ease, border-color .24s ease, box-shadow .24s ease, background .24s ease;
      }

      .fs-mpc-model-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        z-index: 5;
        height: 4px;
        background: var(--mpc-blue);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .3s ease;
      }

      .fs-mpc-model-card:hover {
        transform: translateY(-3px);
        border-color: var(--mpc-blue);
        box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
        background: #ffffff;
      }

      .fs-mpc-model-card:hover::before {
        transform: scaleX(1);
      }

      .fs-mpc-card-top {
        padding: 24px 22px 18px;
        border-bottom: 1px solid rgba(223, 230, 241, .9);
        background: linear-gradient(180deg, #ffffff, #f9fbff);
      }

      .fs-mpc-family {
        display: inline-flex;
        color: var(--mpc-blue);
        font-size: 10px;
        font-weight: 950;
        letter-spacing: .1em;
        text-transform: uppercase;
      }

      .fs-mpc-model-line {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 12px;
        margin-top: 8px;
      }

      .fs-mpc-model-line h3 {
        font-size: 24px;
        line-height: 1.08;
        margin: 0;
        color: var(--mpc-ink);
        letter-spacing: -.02em;
        font-weight: 900;
      }

      .fs-mpc-hp-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        padding: 7px 11px;
        border-radius: 999px;
        background: #f2f6ff;
        color: var(--mpc-blue);
        border: 1px solid #dce6fb;
        font-weight: 900;
        font-size: 12px;
        letter-spacing: .04em;
      }

      .fs-mpc-pressure-control {
        padding: 16px 18px 0;
      }

      .fs-mpc-pressure-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 8px;
      }

      .fs-mpc-pressure-control label,
      .fs-mpc-reading-label,
      .fs-mpc-card-specs b {
        display: block;
        color: #647086;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .075em;
        font-weight: 900;
      }

      .fs-mpc-pressure-control select {
        width: 100%;
        min-width: 0;
      }

      .fs-mpc-primary-reading {
        margin: 14px 18px 16px;
        background: #0018dc;
        color: #ffffff;
        border-radius: 7px;
        padding: 17px 18px;
        box-shadow: none;
      }

      .fs-mpc-reading-label {
        color: #98edff !important;
        background: transparent !important;
        box-shadow: none !important;
        border: none !important;
        padding: 0 !important;
        margin-bottom: 8px;
      }

      .fs-mpc-reading-value {
        display: grid;
        gap: 4px;
        font-size: 20px;
        font-weight: 950;
      }

      .fs-mpc-reading-value .metric,
      .fs-mpc-reading-value .imperial {
        font-size: 20px;
        line-height: 1.2;
        font-weight: 950;
        color: #ffffff;
        white-space: nowrap;
      }

      .fs-mpc-reading-value small {
        font-size: 12px;
        color: #dcecff;
        font-weight: 800;
      }

      .fs-mpc-card-specs {
        padding: 0 18px 18px;
        display: grid;
        gap: 10px;
      }

      .fs-mpc-card-specs>div {
        position: relative;
        background: #f7f9fd;
        border: 1px solid #e7edf6;
        border-radius: 7px;
        padding: 13px 14px 13px 42px;
        box-shadow: none;
      }

      .fs-mpc-card-specs>div::before {
        content: "";
        position: absolute;
        left: 13px;
        top: 15px;
        width: 17px;
        height: 17px;
        border-radius: 5px;
        background: var(--mpc-blue);
        opacity: .9;
      }

      .fs-mpc-card-specs span {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        align-items: baseline;
        font-size: 16px;
        font-weight: 950;
        color: var(--mpc-ink);
      }

      .fs-mpc-card-specs small {
        font-size: 12px;
        color: #647086;
        font-weight: 850;
      }

      .fs-mpc-sizing-notes {
        margin-top: 22px;
        background: #fbfcff;
        border: 1px solid var(--mpc-line);
        border-radius: 7px;
        padding: 18px 20px;
        color: #647086;
        font-size: 13px;
        box-shadow: 0 10px 28px rgba(7, 17, 38, .045);
        line-height: 1.65;
      }

      .fs-mpc-sizing-notes strong {
        display: block;
        color: var(--mpc-ink);
        font-size: 14px;
        margin-bottom: 8px;
      }

      .fs-mpc-sizing-notes ol {
        margin: 0;
        padding-left: 18px;
        display: grid;
        gap: 7px;
      }

      .fs-mpc-sizing-notes li {
        padding-left: 4px;
      }

      @media(max-width:1120px) {
        .fs-mpc-cards {
          grid-template-columns: repeat(2, 1fr);
        }

        .fs-mpc-section-head {
          grid-template-columns: 1fr;
          gap: 12px;
        }
      }

      @media(max-width:720px) {
        .fs-mpc-spec-section {
          padding: 46px 0;
        }

        .fs-mpc-wrap {
          width: min(100% - 30px, 1200px);
        }

        .fs-mpc-global-control {
          position: static;
          width: 100%;
          margin-left: 0;
          margin-right: 0;
          border-radius: 7px;
          align-items: stretch;
          flex-direction: column;
          padding: 14px;
        }

        .fs-mpc-global-control strong {
          font-size: 14px;
        }

        .fs-mpc-spec-section select {
          width: 100%;
          min-width: 0;
        }

        .fs-mpc-cards {
          grid-template-columns: 1fr;
        }

        .fs-mpc-model-line h3 {
          font-size: 22px;
        }
      }
    </style>

    <div class="fs-mpc-wrap">
      <div class="fs-mpc-section-head">
        <div class="fs-mpc-rail">Technical specifications</div>

        <div>
          <h2>Engineering validation for the MultiphaseCommander™ family.</h2>

          <p class="lead">
            Compare the model range visually, then review the detailed specifications for sizing, horsepower,
            gas-rate performance, and site requirements.
          </p>

          <p class="lead">
            Select an inlet pressure to review gas capacity across the MultiphaseCommander™ model range.
          </p>
        </div>
      </div>

      <div class="fs-mpc-global-control">
        <div>
          <strong>Compare all models at</strong>
        </div>

        <select id="fsMpcGlobalPressure">
          <option value="0">5 psi | 34 kPa</option>
          <option value="1">50 psi | 345 kPa</option>
          <option value="2">100 psi | 690 kPa</option>
          <option value="3">150 psi | 1034 kPa</option>
          <option value="4" selected>200 psi | 1379 kPa</option>
        </select>
      </div>

      <div class="fs-mpc-cards">
        <article class="fs-mpc-model-card">
          <div class="fs-mpc-card-top">
            <span class="fs-mpc-family">MultiphaseCommander™</span>

            <div class="fs-mpc-model-line">
              <h3>MC1235 (050035)</h3>
              <span class="fs-mpc-hp-badge">50 HP</span>
            </div>
          </div>

          <div class="fs-mpc-pressure-control">
            <div class="fs-mpc-pressure-row">
              <label for="fsMpcPressure0">Inlet pressure</label>
            </div>

            <select id="fsMpcPressure0" class="fs-mpc-pressure-select" data-card="0">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">50 psi | 345 kPa</option>
              <option value="2">100 psi | 690 kPa</option>
              <option value="3">150 psi | 1034 kPa</option>
              <option value="4" selected>200 psi | 1379 kPa</option>
            </select>
          </div>

          <div class="fs-mpc-primary-reading">
            <span class="fs-mpc-reading-label">Gas Capacity</span>
            <div class="fs-mpc-reading-value" id="fsMpcGasReading0"></div>
          </div>

          <div class="fs-mpc-card-specs">
            <div>
              <b>Max liquid rate</b>
              <span>
                <span class="metric">2,238 <small>m³/d</small></span>
                <span class="imperial">14,077 <small>bbl/d</small></span>
              </span>
            </div>

            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1034 <small>kPag</small></span>
                <span class="imperial">150 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-mpc-model-card">
          <div class="fs-mpc-card-top">
            <span class="fs-mpc-family">MultiphaseCommander™</span>

            <div class="fs-mpc-model-line">
              <h3>MC1245 (050035)</h3>
              <span class="fs-mpc-hp-badge">50 HP</span>
            </div>
          </div>

          <div class="fs-mpc-pressure-control">
            <div class="fs-mpc-pressure-row">
              <label for="fsMpcPressure1">Inlet pressure</label>
            </div>

            <select id="fsMpcPressure1" class="fs-mpc-pressure-select" data-card="1">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">50 psi | 345 kPa</option>
              <option value="2">100 psi | 690 kPa</option>
              <option value="3">150 psi | 1034 kPa</option>
              <option value="4" selected>200 psi | 1379 kPa</option>
            </select>
          </div>

          <div class="fs-mpc-primary-reading">
            <span class="fs-mpc-reading-label">Gas Capacity</span>
            <div class="fs-mpc-reading-value" id="fsMpcGasReading1"></div>
          </div>

          <div class="fs-mpc-card-specs">
            <div>
              <b>Max liquid rate</b>
              <span>
                <span class="metric">1,344 <small>m³/d</small></span>
                <span class="imperial">8,454 <small>bbl/d</small></span>
              </span>
            </div>

            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1896 <small>kPag</small></span>
                <span class="imperial">275 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-mpc-model-card">
          <div class="fs-mpc-card-top">
            <span class="fs-mpc-family">MultiphaseCommander™</span>

            <div class="fs-mpc-model-line">
              <h3>MC1245 (100060)</h3>
              <span class="fs-mpc-hp-badge">100 HP</span>
            </div>
          </div>

          <div class="fs-mpc-pressure-control">
            <div class="fs-mpc-pressure-row">
              <label for="fsMpcPressure2">Inlet pressure</label>
            </div>

            <select id="fsMpcPressure2" class="fs-mpc-pressure-select" data-card="2">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">50 psi | 345 kPa</option>
              <option value="2">100 psi | 690 kPa</option>
              <option value="3">150 psi | 1034 kPa</option>
              <option value="4" selected>200 psi | 1379 kPa</option>
            </select>
          </div>

          <div class="fs-mpc-primary-reading">
            <span class="fs-mpc-reading-label">Gas Capacity</span>
            <div class="fs-mpc-reading-value" id="fsMpcGasReading2"></div>
          </div>

          <div class="fs-mpc-card-specs">
            <div>
              <b>Max liquid rate</b>
              <span>
                <span class="metric">2,345 <small>m³/d</small></span>
                <span class="imperial">14,750 <small>bbl/d</small></span>
              </span>
            </div>

            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1896 <small>kPag</small></span>
                <span class="imperial">275 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-mpc-model-card">
          <div class="fs-mpc-card-top">
            <span class="fs-mpc-family">MultiphaseCommander™</span>

            <div class="fs-mpc-model-line">
              <h3>MC1645 (100060)</h3>
              <span class="fs-mpc-hp-badge">100 HP</span>
            </div>
          </div>

          <div class="fs-mpc-pressure-control">
            <div class="fs-mpc-pressure-row">
              <label for="fsMpcPressure3">Inlet pressure</label>
            </div>

            <select id="fsMpcPressure3" class="fs-mpc-pressure-select" data-card="3">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">50 psi | 345 kPa</option>
              <option value="2">100 psi | 690 kPa</option>
              <option value="3">150 psi | 1034 kPa</option>
              <option value="4" selected>200 psi | 1379 kPa</option>
            </select>
          </div>

          <div class="fs-mpc-primary-reading">
            <span class="fs-mpc-reading-label">Gas Capacity</span>
            <div class="fs-mpc-reading-value" id="fsMpcGasReading3"></div>
          </div>

          <div class="fs-mpc-card-specs">
            <div>
              <b>Max liquid rate</b>
              <span>
                <span class="metric">4,200 <small>m³/d</small></span>
                <span class="imperial">26,417 <small>bbl/d</small></span>
              </span>
            </div>

            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1034 <small>kPag</small></span>
                <span class="imperial">150 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-mpc-model-card">
          <div class="fs-mpc-card-top">
            <span class="fs-mpc-family">MultiphaseCommander™</span>

            <div class="fs-mpc-model-line">
              <h3>MC2270 (100128)</h3>
              <span class="fs-mpc-hp-badge">100 HP</span>
            </div>
          </div>

          <div class="fs-mpc-pressure-control">
            <div class="fs-mpc-pressure-row">
              <label for="fsMpcPressure4">Inlet pressure</label>
            </div>

            <select id="fsMpcPressure4" class="fs-mpc-pressure-select" data-card="4">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">50 psi | 345 kPa</option>
              <option value="2">100 psi | 690 kPa</option>
              <option value="3">150 psi | 1034 kPa</option>
              <option value="4" selected>200 psi | 1379 kPa</option>
            </select>
          </div>

          <div class="fs-mpc-primary-reading">
            <span class="fs-mpc-reading-label">Gas Capacity</span>
            <div class="fs-mpc-reading-value" id="fsMpcGasReading4"></div>
          </div>

          <div class="fs-mpc-card-specs">
            <div>
              <b>Max liquid rate</b>
              <span>
                <span class="metric">6,600 <small>m³/d</small></span>
                <span class="imperial">41,513 <small>bbl/d</small></span>
              </span>
            </div>

            <div>
              <b>Max ΔP</b>
              <span>
                <span class="metric">1551 <small>kPag</small></span>
                <span class="imperial">225 <small>psig</small></span>
              </span>
            </div>
          </div>
        </article>

        <article class="fs-mpc-model-card">
          <div class="fs-mpc-card-top">
            <span class="fs-mpc-family">MultiphaseCommander™</span>

            <div class="fs-mpc-model-line">
              <h3>MC2270 (150128)</h3>
              <span class="fs-mpc-hp-badge">150 HP</span>
            </div>
          </div>

          <div class="fs-mpc-pressure-control">
            <div class="fs-mpc-pressure-row">
              <label for="fsMpcPressure5">Inlet pressure</label>
            </div>

            <select id="fsMpcPressure5" class="fs-mpc-pressure-select" data-card="5">
              <option value="0">5 psi | 34 kPa</option>
              <option value="1">50 psi | 345 kPa</option>
              <option value="2">100 psi | 690 kPa</option>
              <option value="3">150 psi | 1034 kPa</option>
              <option value="4" selected>200 psi | 1379 kPa</option>
            </select>
          </div>

          <div class="fs-mpc-primary-reading">
            <span class="fs-mpc-reading-label">Gas Capacity</span>
            <div class="fs-mpc-reading-value" id="fsMpcGasReading5"></div>
          </div>

          <div class="fs-mpc-card-specs">
            <div>
              <b>Max liquid rate</b>
              <span>
                <span class="metric">6,600 <small>m³/d</small></span>
                <span class="imperial">41,513 <small>bbl/d</small></span>
              </span>
            </div>

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
        .fs-mpc-sizing-notes ol {
          list-style-type: decimal !important;
          padding-left: 24px;
        }

        .fs-mpc-sizing-notes ol li::before {
          content: none !important;
        }
      </style>

      <div class="fs-mpc-sizing-notes">
        <strong>Engineering notes</strong>

        <ol>
          <li>
            Flow conditions are calculated at 15℃ [59℉] inlet pressure and with various components operating at
            100% efficiency. Flow rates may vary based on inlet pressures, gas content, and other factors.
          </li>

          <li>
            Max gas rates and max pressure differentials can be increased by configuring additional units in
            parallel or in series.
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
            '<span class="metric">3.0 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">106 <small>MCF/day</small></span>',
            '<span class="metric">9.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">350 <small>MCF/day</small></span>',
            '<span class="metric">17.5 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">618 <small>MCF/day</small></span>',
            '<span class="metric">25.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">886 <small>MCF/day</small></span>',
            '<span class="metric">32.7 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">1,155 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">1.8 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">64 <small>MCF/day</small></span>',
            '<span class="metric">5.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">208 <small>MCF/day</small></span>',
            '<span class="metric">10.4 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">367 <small>MCF/day</small></span>',
            '<span class="metric">14.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">526 <small>MCF/day</small></span>',
            '<span class="metric">19.4 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">685 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">3.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">109 <small>MCF/day</small></span>',
            '<span class="metric">10.3 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">364 <small>MCF/day</small></span>',
            '<span class="metric">18.3 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">646 <small>MCF/day</small></span>',
            '<span class="metric">26.3 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">929 <small>MCF/day</small></span>',
            '<span class="metric">34.3 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">1,211 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">5.7 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">201 <small>MCF/day</small></span>',
            '<span class="metric">18.5 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">653 <small>MCF/day</small></span>',
            '<span class="metric">32.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">1,162 <small>MCF/day</small></span>',
            '<span class="metric">47.2 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">1,667 <small>MCF/day</small></span>',
            '<span class="metric">61.5 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">2,172 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">8.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">314 <small>MCF/day</small></span>',
            '<span class="metric">29.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">1,028 <small>MCF/day</small></span>',
            '<span class="metric">51.5 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">1,819 <small>MCF/day</small></span>',
            '<span class="metric">74 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">2,613 <small>MCF/day</small></span>',
            '<span class="metric">96.4 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">3,404 <small>MCF/day</small></span>'
          ],
          [
            '<span class="metric">8.9 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">314 <small>MCF/day</small></span>',
            '<span class="metric">29.1 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">1,028 <small>MCF/day</small></span>',
            '<span class="metric">51.5 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">1,819 <small>MCF/day</small></span>',
            '<span class="metric">74 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">2,613 <small>MCF/day</small></span>',
            '<span class="metric">96.4 <small>e<sup>3</sup> m<sup>3</sup>/day</small></span><span class="imperial">3,404 <small>MCF/day</small></span>'
          ]
        ];

        function updateMpcCard(index, pressureIndex) {
          const element = document.getElementById('fsMpcGasReading' + index);

          if (!element || !gasData[index]) {
            return;
          }

          element.innerHTML = gasData[index][pressureIndex] || '<span class="metric">N/A</span><span class="imperial">N/A</span>';
        }

        document.querySelectorAll('.fs-mpc-pressure-select').forEach(function (select) {
          const cardIndex = Number(select.dataset.card);

          select.value = '4';
          updateMpcCard(cardIndex, Number(select.value));

          select.addEventListener('change', function (event) {
            updateMpcCard(Number(event.target.dataset.card), Number(event.target.value));
          });
        });

        const globalPressure = document.getElementById('fsMpcGlobalPressure');

        if (globalPressure) {
          globalPressure.value = '4';

          globalPressure.addEventListener('change', function (event) {
            const pressureIndex = Number(event.target.value);

            document.querySelectorAll('.fs-mpc-pressure-select').forEach(function (select) {
              select.value = String(pressureIndex);
              updateMpcCard(Number(select.dataset.card), pressureIndex);
            });
          });
        }
      })();
    </script>
  </section>

  <section class="cta">
    <div class="wrap py-12">

      <div class="cta-box">
        <div>
          <div class="kicker mb-2" style="color:#0018dc;">Customized Technical CTA</div>
          <h2>Submit your fluid conditions for a MultiphaseCommander™ application review.</h2>
          <p>
            If your system is constrained by liquid-loaded gas flow, unstable operating conditions, rising system
            pressure, or too much surface equipment, Fluidstream can review your application against the actual gas,
            liquid, pressure, and site constraints to identify a production-focused, lower-maintenance
            MultiphaseCommander™ configuration.
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
              <span>Gas rate, liquid rate, and fluid composition</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Inlet and discharge pressure targets</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Backpressure or gathering-system constraints</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>Artificial-lift or pad-level operating context</span>
            </li>

            <li class="flex items-start gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-[#0018dc] mt-[4px]" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h12" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m13 6 6 6-6 6" />
              </svg>
              <span>H₂S, cold-weather, sand, or remote-control requirements</span>
            </li>
          </ul>

          <div class="btn-row" style="margin-bottom:0;">
            <a class="btn btn-1 btn-primary" href="#">Request MultiphaseCommander™ Review</a>
            <a class="btn btn-1 btn-secondary-1" href="#specifications">Review Specifications</a>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection