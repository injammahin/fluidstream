@extends('layouts.app')

@section('content')
  <style>
    :root {
      --bg: #ffffff;
      --bg-soft: #f5f7fb;
      --bg-accent: #eef4ff;
      --text: #0a1c4d;
      --muted: #1029ea;
      --line: #dce6ff;
      --primary: #0018dc;
      --accent: #15d1ff;
      --shadow: 0 18px 50px rgba(5, 35, 95, .10);
      --max: 1360px;
    }

    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      font-family: Inter, Arial, Helvetica, sans-serif;
      background: #ffffff;
      color: var(--text);
      line-height: 1.55;
    }

    img {
      display: block;
      max-width: 100%;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    .container {
      width: min(calc(100% - 40px), var(--max));
      margin: 0 auto;
    }

    /* .section {
                                                                                                                                                          padding: 84px 0;
                                                                                                                                                        } */

    .section-surface-white {
      background: #ffffff;
    }

    .section-surface-soft {
      position: relative;
      /* background: linear-gradient(180deg, #fafcff 0%, #f2f5f9 100%); */
      /* border-top: 1px solid #edf2fb; */
      /* border-bottom: 1px solid #edf2fb; */
    }

    .kicker mb-2 {
      display: inline-flex;
      align-items: center;
      font-size: 13px;
      font-weight: 800;
      letter-spacing: .18em;
      text-transform: uppercase;
      color: var(--primary);
    }

    .hero-tech {
      position: relative;
      overflow: hidden;
      background: #0018dc;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      isolation: isolate;
    }

    /* .hero-tech::before {
                                                                                                                                                                                                  content: "";
                                                                                                                                                                                                  position: absolute;
                                                                                                                                                                                                  inset: 0;
                                                                                                                                                                                                  background:
                                                                                                                                                                                                    linear-gradient(90deg, rgba(0, 24, 220, 0.90) 0%, rgba(0, 24, 220, 0.78) 45%, rgba(0, 24, 220, 0.68) 100%),
                                                                                                                                                                                                    url('{{ asset("/img/hero/hero.avif") }}');
                                                                                                                                                                                                  background-size: cover;
                                                                                                                                                                                                  background-position: center;
                                                                                                                                                                                                  background-repeat: no-repeat;
                                                                                                                                                                                                  transform: scale(1.02);
                                                                                                                                                                                                  z-index: -2;
                                                                                                                                                                                                }
                                                                                                                                                                                                 */
    .hero-tech::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(2, 8, 23, .38) url('/img/hero/technology-hero-pic.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      transform: scale(1.02);
      z-index: -2;
    }

    .hero-tech::after {
      content: "";
      position: absolute;
      inset: 0;
      background: #0206177a;
      z-index: -1;
    }

    .hero-tech .hero-copy {
      max-width: 1120px;
      padding-top: 18px;
      padding-bottom: 18px;
    }

    .hero-tech .hero-line {
      width: 132px;
      height: 3px;
      background: linear-gradient(90deg, #15d1ff, rgba(255, 255, 255, 0));
      border-radius: 999px;
      margin: 24px 0 0;
    }

    .hero-tech .hero-actions {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
      margin-top: 28px;
    }

    .hero-tech .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 56px;
      padding: 0 24px;
      border-radius: 16px;
      font-size: 16px;
      font-weight: 600;
      transition: all 0.25s ease;
      text-decoration: none;
    }

    .hero-tech .btn.primary {
      background: #ffffff;
      color: #0018dc;
      border: 1px solid #ffffff;
      box-shadow: 0 18px 40px rgba(0, 0, 0, 0.16);
    }

    .hero-tech .btn.primary:hover {
      transform: translateY(-2px);
    }

    .hero-tech .btn.secondary {
      background: rgba(255, 255, 255, 0.10);
      color: #ffffff;
      border: 1px solid rgba(255, 255, 255, 0.22);
      backdrop-filter: blur(8px);
    }

    .hero-tech .btn.secondary:hover {
      background: rgba(255, 255, 255, 0.16);
      transform: translateY(-2px);
    }

    .hero-tech .hero-highlights--feature-cards {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 24px;
      max-width: 1480px;
      margin-top: 40px;
      align-items: stretch;
    }

    .hero-tech .hero-feature-card {
      position: relative;
      display: grid;
      grid-template-rows: auto auto auto 1fr auto auto;
      row-gap: 12px;
      min-height: 565px;
      padding: 26px 20px 24px;
      border-radius: 5px;
      background: #ffffff;
      box-shadow: 0 24px 56px rgba(5, 35, 95, .14);
      color: #0a1c4d;
      text-decoration: none;
      transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
      overflow: hidden;
    }

    .hero-tech .hero-feature-card:hover {
      transform: translateY(-4px);
      border-color: #0018dc;
      box-shadow: 0 30px 62px rgba(5, 35, 95, .18);
    }

    .hero-tech .hero-feature-card__label {
      margin: 4px 0 0;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: .16em;
      text-transform: uppercase;
      color: #0018dc;
    }

    .hero-tech .hero-feature-card__title {
      margin: 0;
      font-size: 19px;
      line-height: 1.06;
      letter-spacing: -.04em;
      font-weight: 600;
      color: #0a1c4d;
    }

    .hero-tech .hero-feature-card__text {
      margin: 0;
      font-size: 16px;
      line-height: 1.7;
      color: #52667a;
    }

    .hero-tech .hero-feature-card__mini {
      margin-top: auto;
      min-height: 250px;
      padding: 14px 14px 16px;
      border: 1px solid #e2eaf6;
      border-radius: 7px;
      background: #f8fbff;
      display: grid;
      grid-template-rows: auto 1fr;
      align-content: start;
    }

    .hero-tech .hero-feature-card__mini-label {
      margin: 0 0 10px;
      font-size: 12px;
      font-weight: 800;
      letter-spacing: .16em;
      text-transform: uppercase;
      color: #0018dc;
    }

    .hero-tech .hero-feature-card__mini p {
      margin: 0;
      font-size: 16px;
      line-height: 1.65;
      color: #0a1c4d;
    }

    .hero-tech .hero-feature-card__cta {
      margin-top: 6px;
      min-height: 64px;
      display: grid;
      grid-template-columns: minmax(0, 1fr) auto;
      align-items: end;
      gap: 14px;
      font-size: 14px;
      line-height: 1.4;
      font-weight: 800;
      color: #0a1c4d;
    }

    .hero-tech .hero-feature-card__arrow {
      align-self: end;
      font-size: 28px;
      line-height: 1;
      color: #0018dc;
    }

    @media (max-width: 1400px) {
      .hero-tech .hero-highlights--feature-cards {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }

      .hero-tech .hero-feature-card {
        min-height: 100%;
      }
    }

    @media (max-width: 760px) {
      .hero-tech .hero-highlights--feature-cards {
        grid-template-columns: 1fr;
        gap: 18px;
      }

      .hero-tech .hero-feature-card {
        min-height: auto;
        padding: 22px 20px;
        border-radius: 22px;
        grid-template-rows: auto auto auto auto auto auto;
      }

      .hero-tech .hero-feature-card__title {
        font-size: 22px;
      }

      .hero-tech .hero-feature-card__text,
      .hero-tech .hero-feature-card__mini p,
      .hero-tech .hero-feature-card__cta {
        font-size: 15px;
      }

      .hero-tech .hero-feature-card__mini {
        min-height: auto;
        border-radius: 18px;
        padding: 16px;
      }

      .hero-tech .hero-feature-card__cta {
        min-height: auto;
      }
    }

    .visual-shell {
      position: sticky;
      top: 92px;
    }

    .overview-stage-wrap {
      background: #ffffff;
      padding: 56px 0 64px;
      border-top: 1px solid #edf2fb;
      border-bottom: 1px solid #edf2fb;
    }

    .overview-stage-container {
      max-width: 1200px !important;
      margin: 0 auto;
    }

    .overview-stage-heading {
      max-width: 640px;
      margin-bottom: 34px;
    }

    .overview-stage-heading .kicker {
      margin-bottom: 14px;
    }

    .overview-stage-title {
      margin: 0;
      max-width: 15ch;
      /* font-size: clamp(38px, 4vw, 64px); */
      line-height: 0.96;
      letter-spacing: -0.055em;
      color: #1f1f21;
    }

    .visual-shell {
      position: relative;
      top: auto;
    }

    .image-stage {
      position: relative;
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
      overflow: visible;
      border-radius: 0;
      background: #ffffff;
    }

    .image-stage img {
      width: 100%;
      height: auto;
      display: block;
    }

    /* Hotspot base */
    .hotspot {
      position: absolute;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background: var(--accent);
      border: 3px solid #ffffff;
      box-shadow: 0 0 0 10px rgba(21, 209, 255, .16), 0 0 22px rgba(21, 209, 255, .35);
      cursor: pointer;
      transition: .18s ease;
      z-index: 5;
    }

    .hotspot:hover,
    .hotspot.active {
      transform: scale(1.08);
      box-shadow: 0 0 0 14px rgba(21, 209, 255, .18), 0 0 28px rgba(21, 209, 255, .45);
    }

    .hotspot-label {
      position: absolute;
      top: -8px;
      left: 30px;
      white-space: nowrap;
      background: rgba(255, 255, 255, .96);
      color: var(--text);
      border: 1px solid var(--line);
      padding: 9px 14px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 800;
      letter-spacing: .06em;
      text-transform: uppercase;
      box-shadow: 0 18px 50px rgba(5, 35, 95, .10);
    }

    .hotspot.left .hotspot-label {
      left: auto;
      right: 30px;
    }

    @media (max-width: 760px) {
      .overview-stage-wrap {
        padding: 44px 0 48px;
      }

      .overview-stage-heading {
        margin-bottom: 24px;
      }

      .overview-stage-title {
        max-width: 14ch;
        font-size: 38px;
      }

      .hotspot {
        width: 18px;
        height: 18px;
      }

      .hotspot-label {
        display: none;
      }
    }

    .image-stage {
      position: relative;
      /* background: #f0f4f8; */
      border-radius: 22px;
      overflow: hidden;
    }

    .image-stage img {
      width: 100%;
      height: auto;
    }

    .hotspot {
      position: absolute;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background: var(--accent);
      border: 3px solid #fff;
      box-shadow: 0 0 0 10px rgba(21, 209, 255, .16), 0 0 22px rgba(21, 209, 255, .35);
      cursor: pointer;
      transition: .18s ease;
      z-index: 5;
    }

    .hotspot:hover,
    .hotspot.active {
      transform: scale(1.08);
      box-shadow: 0 0 0 14px rgba(21, 209, 255, .18), 0 0 28px rgba(21, 209, 255, .45);
    }

    .hotspot-label {
      position: absolute;
      top: -6px;
      left: 28px;
      white-space: nowrap;
      background: rgba(255, 255, 255, .95);
      color: var(--text);
      border: 1px solid var(--line);
      padding: 9px 12px;
      border-radius: 999px;
      font-size: 12px;
      font-weight: 800;
      letter-spacing: .06em;
      text-transform: uppercase;
      box-shadow: var(--shadow);
    }

    .hotspot.left .hotspot-label {
      left: auto;
      right: 28px;
    }

    .hotspot-panel {
      margin: 0 auto;
      padding: 42px 0 42px;
    }

    .color {
      background: #f0f0f0;

    }

    .hotspot-panel .mini {
      font-size: 12px;
      font-weight: 800;
      letter-spacing: .16em;
      text-transform: uppercase;
      color: var(--accent);
      margin-bottom: 10px;
    }

    .hotspot-panel h3 {
      font-size: 30px;
      line-height: 1.05;
      letter-spacing: -.03em;
      margin: 0 0 10px;
    }

    .hotspot-panel p {
      margin: 0 0 18px;
      color: #393939;
      max-width: 1480px;
    }

    .hotspot-panel ul,
    .copy ul {
      list-style: none;
      margin: 0 0 18px;
      padding-left: 0;
    }

    .hotspot-panel li,
    .copy li {
      position: relative;
      margin: 12px 0;
      padding-left: 42px;
      color: var(--text);
    }

    .hotspot-panel li::before,
    .copy li::before {
      content: "";
      position: absolute;
      left: 0;
      top: 2px;
      width: 24px;
      height: 24px;
      border-radius: 8px;
      /* border: 1px solid #dbe5ff;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                background-color: #ffffff; */
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%230018dc' stroke-width='2.8' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M5 12h12'/%3E%3Cpath d='M13 5l7 7-7 7'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: center;
      background-size: 14px 14px;
      /* box-shadow: 0 10px 22px rgba(16, 40, 234, 0.08); */
    }

    .section-title {
      font-size: clamp(32px, 4vw, 56px);
      line-height: 1;
      letter-spacing: -.04em;
      margin: 0 0 14px;
    }

    .overview-head {
      margin-bottom: 30px;
    }

    .section-intro {
      font-size: 18px;
      color: #000000;
      max-width: 760px;
      margin: 0;
    }

    .features {
      display: grid;
      gap: 24px;
      margin-top: 38px;
    }

    .feature {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 34px;
      align-items: center;
      padding: 32px 0px 32px 0px;
      /* border-radius: 28px; */
      /* background: rgba(255, 255, 255, 0.88); */
      scroll-margin-top: 90px;
      /* border: 1px solid #e7eefc; */
    }

    .feature.reverse .copy {
      order: 2;
    }

    .feature.reverse .visual {
      order: 1;
    }

    .visual-box {
      /* border: 1px solid var(--line); */
      border-radius: 22px;
      min-height: 340px;
      padding: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      position: relative;
      /* background: #ffffff; */
    }

    .feature-indicator {
      position: absolute;
      display: flex;
      align-items: center;
      gap: 10px;
      z-index: 4;
    }

    .feature-indicator .dot {
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: var(--accent);
      border: 3px solid #fff;
      box-shadow: 0 0 0 8px rgba(21, 209, 255, .15), 0 0 20px rgba(21, 209, 255, .25);
    }

    .feature-indicator .tag {
      background: rgba(255, 255, 255, .96);
      border: 1px solid var(--line);
      border-radius: 999px;
      padding: 9px 12px;
      font-size: 12px;
      font-weight: 800;
      letter-spacing: .05em;
      text-transform: uppercase;
      color: var(--text);
      box-shadow: var(--shadow);
      white-space: nowrap;
    }

    .feature-indicator.left {
      flex-direction: row-reverse;
    }

    .feature-indicator.top .tag {
      transform: translateY(-2px);
    }

    .visual-note {
      position: absolute;
      left: 18px;
      right: 18px;
      bottom: 18px;
      padding: 12px 14px;
      background: rgba(255, 255, 255, .92);
      border: 1px solid var(--line);
      border-radius: 14px;
      font-size: 13px;
      line-height: 1.45;
      color: var(--text);
      z-index: 3;
    }

    .visual-note strong {
      color: var(--primary);
    }

    .visual-box img {
      width: 100%;
      height: auto;
      display: block;
      position: relative;
      z-index: 1;
    }

    .copy h2 {
      font-size: clamp(28px, 3vw, 44px);
      line-height: 1.04;
      letter-spacing: -.04em;
      margin: 0 0 16px;
    }

    .copy p {
      font-size: 18px;
      color: #020202;
      margin: 0 0 16px;
    }

    .adv {
      background: #ffff;
      border: 1px solid var(--line);
      border-left: 4px solid var(--accent);
      border-radius: 5px;
      padding: 16px 18px;
    }

    .adv strong {
      display: block;
      margin-bottom: 8px;
      font-size: 13px;
      letter-spacing: .14em;
      text-transform: uppercase;
      color: var(--primary);
    }

    .diff-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      margin-top: 36px;
    }

    .diff-card {
      padding: 26px;
      border-radius: 3px;
      background: #fff;
      border: 1px solid #0018dc26;
    }

    .diff-card h3 {
      font-size: 29px;
      line-height: 1.08;
      letter-spacing: -.03em;
      margin: 0 0 14px;
    }

    .diff-card .line {
      width: 92px;
      height: 3px;
      background: linear-gradient(90deg, var(--accent), transparent);
      border-radius: 999px;
      margin-bottom: 14px;
    }

    .diff-card p {
      margin: 0;
      color: #252526;
      font-size: 18px;
    }

    .quote {
      padding: 52px 26px;
      border-radius: 5px;
      background: linear-gradient(180deg, #ffffff, #ffffff);
      border: 1px solid #0018dc1c;
      box-shadow: var(--shadow);
      text-align: center;
    }

    .quote p {
      font-size: clamp(28px, 3.2vw, 32px);
      line-height: 1.2;
      letter-spacing: -.04em;
      margin: 0;
    }

    .quote em {
      font-style: normal;
      color: var(--primary);
    }

    .footer-note {
      margin-top: 14px;
      text-align: center;
      color: var(--muted);
      font-size: 14px;
    }

    @media (max-width: 1180px) {
      .hero-tech .hero-highlights {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width:1180px) {
      .visual-shell {
        position: relative;
        top: 0;
      }
    }

    @media (max-width:1050px) {
      .feature {
        grid-template-columns: 1fr;
      }

      .feature.reverse .copy,
      .feature.reverse .visual {
        order: initial;
      }
    }

    @media (max-width:760px) {
      .hero-tech {
        min-height: auto;
      }

      .hero-tech .hero-copy {
        padding-top: 8px;
        padding-bottom: 8px;
      }

      .hero-tech .btn {
        width: 100%;
      }

      .container {
        width: min(calc(100% - 28px), var(--max));
      }

      .section {
        padding: 68px 0;
      }

      .diff-grid {
        grid-template-columns: 1fr;
      }

      .hotspot-label {
        display: none;
      }

      .hotspot-panel h3 {
        font-size: 26px;
      }

      .hotspot-panel li,
      .copy li {
        padding-left: 38px;
      }

      .hotspot-panel li::before,
      .copy li::before {
        width: 22px;
        height: 22px;
      }
    }

    .container {
      max-width: 1200px !important;
    }

    .image-stage {
      position: relative;
      border-radius: 22px;
      overflow: hidden;
      /* background: #f4f6fa; */
    }

    .bullet,
    .adv {
      position: relative;
      overflow: hidden;
      transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease, background .25s ease;
    }

    .bullet::after,
    .adv::after {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      height: 3px;
      background: #0018dc;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform .25s cubic-bezier(.22, .61, .36, 1);
    }

    .bullet:hover,
    .adv:hover {
      transform: translateY(-3px);
      border-color: #0018dc;
      box-shadow: 0 18px 36px rgba(16, 42, 67, .08);
      background: #ffffff;
    }

    .bullet:hover::after,
    .adv:hover::after {
      transform: scaleX(1);
    }

    .bullet strong,
    .adv strong {
      transition: color .25s ease;
    }

    .bullet:hover strong,
    .adv:hover strong {
      color: #0018dc;
    }

    .overview-stage-copy {
      position: absolute;
      top: 0px;
      left: 110px;
      z-index: 7;
      max-width: 820px;
      pointer-events: none;
    }

    .overview-stage-kicker mb-2 {
      margin: 0 0 10px;
      color: #0018dc;
      font-size: 12px;
      font-weight: 800;
      letter-spacing: 0;
      line-height: 1.2;
    }

    .overview-stage-title {
      /* margin-bottom: 2.5rem; */
      max-width: 25ch;
      /* color: #0a1c4d; */
      /* font-size: 32px; */
      /* line-height: 0.95; */
      /* letter-spacing: -0.045em; */
      /* font-weight: 700; */
    }

    @media (max-width: 1100px) {
      .overview-stage-copy {
        display: none;
        top: 24px;
        left: 28px;
        max-width: 380px;
      }

      .overview-stage-title {
        /* font-size: clamp(26px, 3vw, 40px); */
        max-width: 9ch;
      }
    }

    @media (max-width: 760px) {
      .overview-stage-copy {
        top: 16px;
        left: 16px;
        max-width: 240px;
      }

      .overview-stage-kicker mb-2 {
        font-size: 10px;
        margin-bottom: 6px;
      }

      .overview-stage-title {
        font-size: 18px;
        line-height: 1;
        max-width: 10ch;
      }
    }

    .features-wrap {
      display: grid;
      /* gap: 30px; */
      margin-top: 34px;
    }

    .feature {
      display: block;
      padding: 0;
      /* border: 1px solid rgba(7, 24, 62, .10); */
      border-radius: 14px;
      /* background: linear-gradient(180deg, #ffffff, #fbfcff); */
      /* box-shadow: 0 10px 30px rgba(7, 24, 62, .06); */
      overflow: hidden;
    }


    .feature-inner {
      display: grid;
      grid-template-columns: 420px minmax(0, 1fr);
      gap: 0;
      align-items: stretch;
    }

    .feature-intro {
      padding: 42px 35px 38px 0px;
      border-right: 1px solid rgba(7, 24, 62, .08);
      /* background: linear-gradient(180deg, #eef6fb 0%, #f7fbfe 100%); */
    }

    .feature-intro .tag {
      display: inline-flex;
      align-items: center;
      padding: 12px 18px;
      border-radius: 999px;
      background: linear-gradient(180deg, #dff5ff, #d1eefb);
      color: #15bff2;
      font-size: 13px;
      font-weight: 800;
      letter-spacing: .14em;
      text-transform: uppercase;
    }

    .feature-intro h3 {
      margin: 10px 0 18px;
      font-size: clamp(28px, 2.5vw, 38px);
      line-height: .98;
      letter-spacing: -.045em;
      color: #1f1f21;
    }

    .feature-intro p {
      margin: 0;
      font-size: 18px;
      line-height: 1.65;
      color: #4b5563;
    }

    .feature-body {
      padding: 40px 36px 38px;
      /* background: #ffffff; */
    }

    .feature-body h4 {
      margin: 0 0 18px;
      font-size: 24px;
      line-height: 1.1;
      letter-spacing: -.03em;
      color: #0f172a;
    }

    .feature-body p {
      margin: 0 0 22px;
      font-size: 17px;
      line-height: 1.75;
      color: #4b5563;
    }

    .bullets {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 16px;
      margin-top: 18px;
    }

    .bullet {
      border: 1px solid rgba(7, 24, 62, .08);
      border-radius: 5px;
      background: #ffff;
      padding: 22px 22px 20px;
    }

    .bullet strong {
      display: block;
      margin: 0 0 10px;
      font-size: 17px;
      line-height: 1.25;
      letter-spacing: -.02em;
      color: #111827;
    }

    .bullet span {
      display: block;
      font-size: 16px;
      line-height: 1.7;
      color: #4b5563;
    }

    .adv {
      margin-top: 22px;
      padding: 24px 24px 22px;
      border: 1px solid #cfe3ff;
      border-radius: 5px;
      /* background: linear-gradient(180deg, #eef9ff 0%, #f8fcff 100%); */
    }

    .adv strong {
      display: block;
      margin: 0 0 10px;
      font-size: 18px;
      font-weight: 800;
      color: #15bff2;
      letter-spacing: -.01em;
      text-transform: none;
    }

    .adv {
      font-size: 17px;
      line-height: 1.7;
      color: #111827;
    }

    @media (max-width: 1180px) {
      .feature-inner {
        grid-template-columns: 340px minmax(0, 1fr);
      }

      .feature-intro {
        padding: 34px 28px 30px;
      }

      .feature-body {
        padding: 34px 28px 30px;
      }
    }

    @media (max-width: 920px) {
      .feature-inner {
        grid-template-columns: 1fr;
      }

      .feature-intro {
        border-right: none;
        border-bottom: 1px solid rgba(7, 24, 62, .08);
      }
    }

    @media (max-width: 760px) {
      .features-wrap {
        gap: 22px;
      }

      .feature {
        border-radius: 12px;
      }

      .feature-intro,
      .feature-body {
        padding: 24px 20px;
      }

      .feature-intro .tag {
        font-size: 11px;
        padding: 10px 14px;
      }

      .feature-intro h3 {
        margin: 18px 0 14px;
        font-size: 34px;
      }

      .feature-intro p,
      .feature-body p,
      .bullet span,
      .adv {
        font-size: 16px;
      }

      .feature-body h4 {
        font-size: 20px;
      }

      .bullets {
        grid-template-columns: 1fr;
        gap: 14px;
      }

      .bullet {
        border-radius: 20px;
        padding: 18px;
      }

      .adv {
        border-radius: 20px;
        padding: 20px 18px;
      }

      .adv strong {
        font-size: 16px;
      }
    }

    .gray {
      background: #f5f7fb;
    }

    #overview {
      background: #ffffff;
    }

    #overview .section-head {
      /* display: grid;
                                                                                                                                        grid-template-columns: minmax(0, 1.05fr) minmax(340px, .95fr);
                                                                                                                                        gap: 44px; */
      align-items: baseline;
      margin-bottom: 42px;
    }

    #overview .kicker mb-2 {
      display: inline-flex;
      align-items: center;
      font-size: 13px;
      font-weight: 800;
      letter-spacing: .18em;
      text-transform: uppercase;
      color: var(--primary);
    }

    #overview .section-head h2 Specificity: (1, 1, 1) {
      margin: 0;
      max-width: 22ch;
      font-size: clamp(24px, 3vw, 44px);
      line-height: .95;
      letter-spacing: -0.05em;
      color: #0a1c4d;
      font-weight: 700;
    }

    #overview .section-head p,
    .pp {
      margin: 0;
      max-width: 68ch;
      font-size: 16px;
      line-height: 1.75;
      color: #424f5d;
    }

    #overview .overview {
      /* display: grid;
                                                                                                                                          grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                                                                                                                                          gap: 28px; */
      align-items: stretch;
    }

    /* #overview .panel {
                                                                                                                          padding: 34px 34px 36px;
                                                                                                                          border: 1px solid #e3ebf5;
                                                                                                                          border-radius: 7px;
                                                                                                                          background: #ffffff;
                                                                                                                          box-shadow: 0 14px 36px rgba(10, 28, 77, .05);
                                                                                                                          height: 100%;
                                                                                                                          display: flex;
                                                                                                                          flex-direction: column;
                                                                                                                        }

                                                                                                                        #overview .panel {
                                                                                                                          padding: 34px 34px 36px;
                                                                                                                          border: 1px solid #e3ebf5;
                                                                                                                          border-radius: 7px;
                                                                                                                          background: #ffffff;
                                                                                                                          box-shadow: 0 14px 36px rgba(10, 28, 77, .05);
                                                                                                                        } */

    #overview .panel h3 {
      margin: 0 0 18px;
      font-size: clamp(28px, 2.4vw, 38px);
      line-height: 1.08;
      letter-spacing: -.03em;
      color: #0a1c4d;
      font-weight: 600;
    }

    /* #overview .panel>p {
                                                                                                                                margin: 0;
                                                                                                                                font-size: 18px;
                                                                                                                                line-height: 1.72;
                                                                                                                                color: #52667a;
                                                                                                                              } */

    #overview .stack {
      display: flex;
      gap: 18px;
      margin-top: 26px;
    }

    #overview .stack .item,
    #overview .flow .box,
    #overview .value {
      position: relative;
      overflow: hidden;
      padding: 24px 22px 22px;
      border: 1px solid #e3ebf5;
      border-radius: 7px;
      background: #ffffff;
      transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease, background .25s ease;
    }

    #overview .stack .item::after,
    #overview .flow .box::after,
    #overview .value::after {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      height: 3px;
      background: #0018dc;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform .25s cubic-bezier(.22, .61, .36, 1);
    }

    #overview .stack .item:hover,
    #overview .flow .box:hover,
    #overview .value:hover {
      transform: translateY(-4px);
      border-color: #0018dc;
      box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
      background: #ffffff;
    }

    #overview .stack .item:hover::after,
    #overview .flow .box:hover::after,
    #overview .value:hover::after {
      transform: scaleX(1);
    }

    #overview .stack .item strong,
    #overview .flow .box h4,
    #overview .value h4 {
      transition: color .25s ease;
    }

    #overview .stack .item:hover strong,
    #overview .flow .box:hover h4,
    #overview .value:hover h4 {
      color: #0018dc;
    }

    #overview .stack .item {
      font-size: 16px;
      line-height: 1.65;
      color: #52667a;
    }

    #overview .stack .item strong {
      display: block;
      margin: 0 0 10px;
      font-size: 18px;
      line-height: 1.22;
      letter-spacing: -.02em;
      color: #0a1c4d;
    }

    #overview .flow {
      display: grid;
      grid-template-columns: minmax(0, 1fr) 56px minmax(0, 1fr);
      gap: 18px;
      align-items: center;
      margin-top: 28px;
    }

    #overview .flow .arrow {
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 40px;
      line-height: 1;
      color: #18c8f7;
      font-weight: 700;
    }

    #overview .flow .box {
      min-height: 190px;
    }

    #overview .flow .box h4 {
      margin: 0 0 12px;
      font-size: 20px;
      line-height: 1.2;
      color: #0a1c4d;
      font-weight: 800;
    }

    #overview .flow .box p {
      margin: 0;
      font-size: 14px;
      line-height: 1.6;
      color: #52667a;
    }

    #overview .value-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 16px;
      margin-top: 18px;
    }

    #overview .value {
      min-height: 100%;
    }

    #overview .value h4 {
      margin: 0 0 12px;
      font-size: 18px;
      line-height: 1.18;
      letter-spacing: -.02em;
      color: #0a1c4d;
      font-weight: 800;
    }

    #overview .value p {
      margin: 0;
      font-size: 16px;
      line-height: 1.62;
      color: #52667a;
    }

    @media (max-width: 1180px) {
      #overview .overview {
        grid-template-columns: 1fr;
      }

      #overview .value-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }

    @media (max-width: 980px) {
      #overview .section-head {
        /* grid-template-columns: 1fr;
                                                                                                                                          gap: 22px; */
        align-items: start;
      }

      #overview .section-head h2 {
        max-width: none;
      }

      #overview .section-head p {
        max-width: none;
      }

      #overview .flow {
        grid-template-columns: 1fr;
      }

      #overview .flow .arrow {
        transform: rotate(90deg);
        min-height: 38px;
      }
    }

    @media (max-width: 640px) {
      #overview .panel {
        padding: 24px 20px;
        border-radius: 7px;
      }

      #overview .panel h3 {
        font-size: 28px;
      }

      #overview .panel>p {
        font-size: 16px;
      }

      #overview .stack .item,
      #overview .flow .box,
      #overview .value {
        padding: 18px 16px;
        border-radius: 18px;
      }

      #overview .value-grid {
        grid-template-columns: 1fr;
      }
    }

    .scroll-to-stage-btn {
      position: fixed;
      right: 24px;
      bottom: 24px;
      width: 58px;
      height: 58px;
      border: 0;
      border-radius: 999px;
      background: linear-gradient(135deg, #0018dc, #2544ff);
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 18px 38px rgba(0, 24, 220, .24);
      cursor: pointer;
      z-index: 9999;
      opacity: 0;
      visibility: hidden;
      transform: translateY(14px) scale(.96);
      transition: opacity .25s ease, visibility .25s ease, transform .25s ease, box-shadow .25s ease;
    }

    .scroll-to-stage-btn.show {
      opacity: 1;
      visibility: visible;
      transform: translateY(0) scale(1);
    }

    .scroll-to-stage-btn.show:hover {
      transform: translateY(-2px) scale(1);
      box-shadow: 0 22px 44px rgba(0, 24, 220, .30);
    }

    .scroll-to-stage-btn svg {
      width: 22px;
      height: 22px;
      stroke: currentColor;
    }

    @media (max-width: 760px) {
      .scroll-to-stage-btn {
        right: 16px;
        bottom: 16px;
        width: 52px;
        height: 52px;
      }
    }

    .hero-patent-callout {
      background: #ffffff;
      border-left: 4px solid #0018dc;
      padding: 16px 24px;
      margin-top: 32px;
      font-size: 16px;
      color: #0a1c4d;
      border-radius: 8px;
    }

    .hero-patent-callout-text {
      line-height: 1.7;
    }

    .hero-patent-link {
      color: #0018dc;
      font-weight: bold;
      text-decoration: underline;
    }

    .hero-patent-callout-text strong {
      font-weight: bold;
    }

    .hero-tech-intro {
      margin-top: 32px;
      font-size: 18px;
      color: #0a1c4d;
    }

    .hero-tech-intro-text {
      line-height: 1.7;
    }

    .hero-patent-callout {
      background: #ffffff;
      border-left: 4px solid #0018dc;
      padding: 16px 24px;
      margin-top: 32px;
      font-size: 16px;
      color: #0a1c4d;
      border-radius: 8px;
    }

    .hero-patent-callout-text {
      line-height: 1.7;
    }

    .hero-patent-link {
      color: #0018dc;
      font-weight: bold;
      text-decoration: underline;
    }

    .hero-patent-callout-text strong {
      font-weight: bold;
    }

    h2 {
      margin: 0 0 16px;
      font-size: clamp(1.9rem, 3vw, 3rem);
      line-height: 1.05;
      letter-spacing: -.04em;
      max-width: 24ch;
      color: #1f1f21;
    }

    .overview-why-section {
      background: #ffffff;
    }

    .overview-approach-section {
      background: #f5f7fb;
      border-top: 1px solid #e5edf8;
      border-bottom: 1px solid #e5edf8;
    }

    .overview-why-section .panel,
    .overview-approach-section .panel {
      width: 100%;
    }

    .overview-why-section .stack,
    .overview-approach-section .stack {
      display: flex;
      gap: 18px;
      margin-top: 26px;
    }

    .overview-why-section .stack .item,
    .overview-approach-section .flow .box,
    .overview-approach-section .value {
      position: relative;
      overflow: hidden;
      padding: 24px 22px 22px;
      border: 1px solid #e3ebf5;
      border-radius: 7px;
      background: #ffffff;
      transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease, background .25s ease;
    }

    .overview-why-section .stack .item::after,
    .overview-approach-section .flow .box::after,
    .overview-approach-section .value::after {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      height: 3px;
      background: #0018dc;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform .25s cubic-bezier(.22, .61, .36, 1);
    }

    .overview-why-section .stack .item:hover,
    .overview-approach-section .flow .box:hover,
    .overview-approach-section .value:hover {
      transform: translateY(-4px);
      border-color: #0018dc;
      box-shadow: 0 22px 46px rgba(16, 42, 67, .10);
      background: #ffffff;
    }

    .overview-why-section .stack .item:hover::after,
    .overview-approach-section .flow .box:hover::after,
    .overview-approach-section .value:hover::after {
      transform: scaleX(1);
    }

    .overview-why-section .stack .item {
      font-size: 16px;
      line-height: 1.65;
      color: #52667a;
    }

    .overview-why-section .stack .item strong,
    .overview-approach-section .flow .box h4,
    .overview-approach-section .value h4 {
      transition: color .25s ease;
    }

    .overview-why-section .stack .item:hover strong,
    .overview-approach-section .flow .box:hover h4,
    .overview-approach-section .value:hover h4 {
      color: #0018dc;
    }

    .overview-why-section .stack .item strong {
      display: block;
      margin: 0 0 10px;
      font-size: 18px;
      line-height: 1.22;
      letter-spacing: -.02em;
      color: #0a1c4d;
    }

    .overview-approach-section .flow {
      display: grid;
      grid-template-columns: minmax(0, 1fr) 56px minmax(0, 1fr);
      gap: 18px;
      align-items: center;
      margin-top: 28px;
    }

    .overview-approach-section .flow .arrow {
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 40px;
      line-height: 1;
      color: #18c8f7;
      font-weight: 700;
    }

    .overview-approach-section .flow .box {
      min-height: 190px;
    }

    .overview-approach-section .flow .box h4 {
      margin: 0 0 12px;
      font-size: 20px;
      line-height: 1.2;
      color: #0a1c4d;
      font-weight: 800;
    }

    .overview-approach-section .flow .box p {
      margin: 0;
      font-size: 14px;
      line-height: 1.6;
      color: #52667a;
    }

    .overview-approach-section .value-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 16px;
      margin-top: 18px;
    }

    .overview-approach-section .value h4 {
      margin: 0 0 12px;
      font-size: 18px;
      line-height: 1.18;
      letter-spacing: -.02em;
      color: #0a1c4d;
      font-weight: 800;
    }

    .overview-approach-section .value p {
      margin: 0;
      font-size: 16px;
      line-height: 1.62;
      color: #52667a;
    }

    @media (max-width: 980px) {
      .overview-why-section .stack {
        flex-direction: column;
      }

      .overview-approach-section .flow {
        grid-template-columns: 1fr;
      }

      .overview-approach-section .flow .arrow {
        transform: rotate(90deg);
        min-height: 38px;
      }

      .overview-approach-section .value-grid {
        grid-template-columns: 1fr;
      }
    }

    /* ================================
                 TECHNOLOGY CTA SECTION
              ================================ */

    .fs-technology-cta {
      background: #f6f8fc;
      border-top: 1px solid #dce3ee;
      padding: 82px 24px 88px;
    }

    .fs-technology-cta__inner {
      max-width: 1180px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: minmax(0, 1fr) auto;
      gap: 54px;
      align-items: center;
    }

    .fs-technology-cta__eyebrow {
      display: block;
      margin: 0 0 14px;
      color: #0018dc;
      font-size: 14px;
      line-height: 1.25;
      font-weight: 800;
      letter-spacing: .02em;
      text-transform: none;
    }

    .fs-technology-cta h2 {
      margin: 0;
      max-width: 55ch;
      color: #0b1220c9;
      font-size: clamp(32px, 4.2vw, 54px);
      line-height: .98;
      letter-spacing: -.045em;
      font-weight: 400;
    }

    .fs-technology-cta p {
      margin: 22px 0 0;
      max-width: 780px;
      color: #526071;
      font-size: 18px;
      line-height: 1.58;
      font-weight: 450;
    }

    .fs-technology-cta__actions {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 14px;
      flex-wrap: wrap;
      min-width: 360px;
    }

    .fs-btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 52px;
      padding: 15px 22px;
      border-radius: 999px;
      text-decoration: none;
      font-size: 15px;
      line-height: 1;
      font-weight: 800;
      letter-spacing: -.01em;
      transition:
        transform .22s ease,
        box-shadow .22s ease,
        background .22s ease,
        color .22s ease,
        border-color .22s ease;
      white-space: nowrap;
    }

    .fs-btn--primary {
      color: #ffffff;
      background: #0018dc;
      border: 1px solid #0018dc;
      box-shadow: 0 18px 34px rgba(0, 24, 220, .18);
    }

    .fs-btn--primary:hover {
      transform: translateY(-2px);
      background: #001096;
      border-color: #001096;
      box-shadow: 0 22px 42px rgba(0, 24, 220, .24);
    }

    .fs-btn--secondary {
      color: #0b1220;
      background: #ffffff;
      border: 1px solid #cfd8e6;
      box-shadow: 0 10px 26px rgba(15, 23, 42, .06);
    }

    .fs-btn--secondary:hover {
      transform: translateY(-2px);
      color: #0018dc;
      border-color: #0018dc;
      box-shadow: 0 16px 34px rgba(15, 23, 42, .10);
    }

    @media (max-width: 900px) {
      .fs-technology-cta {
        padding: 64px 20px 68px;
      }

      .fs-technology-cta__inner {
        grid-template-columns: 1fr;
        gap: 30px;
      }

      .fs-technology-cta__actions {
        min-width: 0;
        justify-content: flex-start;
      }
    }

    @media (max-width: 560px) {
      .fs-technology-cta h2 {
        font-size: 34px;
      }

      .fs-technology-cta p {
        font-size: 16px;
      }

      .fs-technology-cta__actions,
      .fs-btn {
        width: 100%;
      }
    }
  </style>

  <section class="hero-tech ">
    <div class="container max-w-7xl py-12 ">
      <div class="hero-copy">
        <h2
          class="mt-6 max-w-2xl text-4xl font-semibold leading-[1.02] tracking-[-0.045em] text-white sm:text-5xl lg:text-[58px]">
          Engineered for True Multiphase Performance
        </h2>
        <p class="mt-8 max-w-2xl text-lg leading-8 text-white/85 sm:text-[22px] sm:leading-9">
          Fluidstream technology is built from the ground up to reliably handle gas, liquids, and solids without the
          complexity, maintenance burden, or limitations of conventional systems.
        </p>
        <div class="hero-patent-callout max-w-2xl">
          <p class="hero-patent-callout-text max-w-2xl">
            <strong>Supported by patented operating methods.</strong>
            Fluidstream’s liquid-influenced compression response is supported by patented operating methods, including
            <a href="/patented-technology#us11098709b2" class="hero-patent-link">US11098709B2</a>.
            For the full patent overview, see the <a href="/patented-technology" class="hero-patent-link">Patented
              Technology page</a>.
          </p>
        </div>

        <div class="hero-actions mt-4">
          <a class="btn primary" href="#overview">Explore Technology</a>
          <a class="btn secondary" href="#features">View Key Features</a>
        </div>

        <div class="hero-highlights hero-highlights--feature-cards">
          <a href="#liquid-method" class="hero-feature-card">
            <div class="hero-feature-card__topline"></div>
            <div class="hero-feature-card__label">Direct Multiphase Capability</div>
            <h3 class="hero-feature-card__title">Compresses mixed flow without forcing separation first</h3>
            <p class="hero-feature-card__text">
              Designed to handle gas and liquids inside compression, reducing dependence on separators, scrubbers, and
              extra process equipment.
            </p>
            <div class="hero-feature-card__mini">
              <div class="hero-feature-card__mini-label">Why it matters</div>
              <p>Fewer process steps can mean lower footprint, lower complexity, and broader fit across real multiphase
                service.</p>
            </div>
            <div class="hero-feature-card__cta">
              <span>See how the liquid-handling methodology works</span>
              <span class="hero-feature-card__arrow">→</span>
            </div>
          </a>

          <a href="#gland-section" class="hero-feature-card">
            <div class="hero-feature-card__topline"></div>
            <div class="hero-feature-card__label">Advanced Gland Sealing</div>
            <h3 class="hero-feature-card__title">Wear visibility supports more planned maintenance</h3>
            <p class="hero-feature-card__text">
              Patent-pending gland sealing with electronic wear detection gives earlier warning before sealing degradation
              becomes a leak, outage, or emergency callout.
            </p>
            <div class="hero-feature-card__mini">
              <div class="hero-feature-card__mini-label">Why it matters</div>
              <p>Better awareness of seal condition helps protect uptime, reduce leak exposure, and shift maintenance away
                from reactive troubleshooting.</p>
            </div>
            <div class="hero-feature-card__cta">
              <span>Read more on sealing integrity and wear control</span>
              <span class="hero-feature-card__arrow">→</span>
            </div>
          </a>

          <a href="#tracking-section" class="hero-feature-card">
            <div class="hero-feature-card__topline"></div>
            <div class="hero-feature-card__label">Adaptive Protection</div>
            <h3 class="hero-feature-card__title">Piston tracking helps the system respond to upset conditions</h3>
            <p class="hero-feature-card__text">
              Full piston tracking gives the controls better operating context so the unit can react to slugs, solids
              buildup, and changing machine behavior.
            </p>
            <div class="hero-feature-card__mini">
              <div class="hero-feature-card__mini-label">Why it matters</div>
              <p>More responsive control can reduce trips, limit damage risk, and improve autonomous performance when
                field conditions move outside the ideal design point.</p>
            </div>
            <div class="hero-feature-card__cta">
              <span>Explore the control and upset-response strategy</span>
              <span class="hero-feature-card__arrow">→</span>
            </div>
          </a>

          <a href="#sand-section" class="hero-feature-card">
            <div class="hero-feature-card__topline"></div>
            <div class="hero-feature-card__label">Harsh-Service Durability</div>
            <h3 class="hero-feature-card__title">Built for abrasive, unstable, and remote field conditions</h3>
            <p class="hero-feature-card__text">
              Sand-ready sealing, hazardous-fluid containment, and integrated drive controls make the architecture more
              credible in harsh service.
            </p>
            <div class="hero-feature-card__mini">
              <div class="hero-feature-card__mini-label">Why it matters</div>
              <p>When service is dirty, corrosive, or difficult to access, survivability becomes an economic advantage,
                not just a technical claim.</p>
            </div>
            <div class="hero-feature-card__cta">
              <span>Learn how the design improves field survivability</span>
              <span class="hero-feature-card__arrow">→</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <section id="overview" class="section overview-why-section">
    <div class="container py-12">
      <div class="panel">
        <span class="kicker mb-2">Why it matters</span>

        <h2>Separation-first systems create cost, footprint, and reliability penalties.</h2>

        <p class="pp">
          Conventional surface design usually assumes the stream must be cleaned up before compression. That means
          more separators, tanks, scrubbers, interconnections, controls layers, and maintenance points. Every added
          component increases capital cost and expands the number of things that can trip, leak, plug, or fail.
        </p>

        <div class="stack">
          <div class="item">
            <strong>More equipment to protect the compressor</strong>
            Extra hardware is often installed because the compressor itself is not comfortable with liquid carryover,
            solids, or unstable flow.
          </div>

          <div class="item">
            <strong>Higher lifecycle burden</strong>
            More equipment count means more installation work, more inspection, more parts, and more operating
            complexity over time.
          </div>

          <div class="item">
            <strong>Less flexibility under real conditions</strong>
            When the stream changes, conventional gas-only assumptions can turn into trips, downtime, and
            intervention.
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="different-approach" class="section overview-approach-section">
    <div class="container py-12">
      <div class="panel">
        <span class="kicker mb-2">A different approach</span>

        <h2>Fluidstream is designed to move production without depending on ideal upstream conditioning.</h2>

        <p class="pp">
          The Fluidstream approach changes the role of compression in the system. Instead of forcing the production
          stream through a long chain of equipment just to protect the compressor, the machine is designed to tolerate
          and manage the reality of mixed-phase flow inside the compression process. That simplifies infrastructure
          and expands where multiphase technology can be practical.
        </p>

        <div class="flow">
          <div class="box">
            <h4>Conventional system</h4>
            <p>Wellstream → Separator → Tank → Scrubber → Compressor → Pipeline</p>
          </div>

          <div class="arrow">→</div>

          <div class="box">
            <h4>Fluidstream system</h4>
            <p>Wellstream → Fluidstream Multiphase Compression → Pipeline</p>
          </div>
        </div>

        <div class="value-grid">
          <div class="value">
            <h4>Reduced equipment count</h4>
            <p>Lower footprint and fewer interconnections compared with separation-heavy facilities.</p>
          </div>

          <div class="value">
            <h4>Stronger uptime potential</h4>
            <p>Designed to keep performing through variable gas-liquid ratios and non-steady-state events.</p>
          </div>

          <div class="value">
            <h4>Better emissions capture</h4>
            <p>
              Supports recovery of gas that might otherwise be vented or flared when conventional systems become
              unreliable.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-surface-white overview-stage-wrap">
    <div class="container overview-stage-container">
      <div class="overview-stage-heading">
        <div class="kicker mb-2">Inside the Technology</div>
        <h2 class="overview-stage-title">
          See where the technology advantage is built into the system
        </h2>
      </div>

      <div class="visual-shell">
        <div class="image-stage" id="overview-stage">
          <img src="/img/2270 Rear View.JPG" alt="Fluidstream technology unit" />

          <button class="hotspot active" data-feature="liquid" style="left:25%;top:36%">
            <span class="hotspot-label">Liquid Methodology</span>
          </button>

          <button class="hotspot" data-feature="gland" style="left:30%;top:45%">
            <span class="hotspot-label">Gland Sealing</span>
          </button>

          <button class="hotspot left" data-feature="alignment" style="left:53%;top:48%">
            <span class="hotspot-label">Alignment</span>
          </button>

          <button class="hotspot" data-feature="tracking" style="left:17%;top:53%">
            <span class="hotspot-label">Piston Tracking</span>
          </button>

          <button class="hotspot left" data-feature="drives" style="left:83%;top:50%">
            <span class="hotspot-label">Drive + Controls</span>
          </button>

          <button class="hotspot" data-feature="sand" style="left:5%;top:40%">
            <span class="hotspot-label">Sand Optimization</span>
          </button>
        </div>
      </div>
    </div>
  </section>


  <section id="features" class="section contrast">
    <div class="">
      <div class="section-head   container">
        <div>
          <span class="kicker mb-2">Core technology features</span>
          <h2>Expanded technical detail for each major technology advantage.</h2>
        </div>
        <p class="pp">
          Each feature below explains how the technology works, the field problem it addresses, and the practical
          operating benefit it delivers.
        </p>
      </div>

      <div class="features-wrap">
        <div class="gray">
          <div class="container">
            <article class="feature" id="liquid-method">
              <div class="feature-inner">
                <div class="feature-intro">
                  <span class="kicker mb-2">Liquid handling methodology</span>
                  <h3>Patent-focused methodology for handling incompressible liquids.</h3>
                  <p>
                    The technology story starts here: Fluidstream is not trying to avoid liquid presence at all costs. It
                    is
                    designed around the fact that liquids can enter the compression process and must be handled in a
                    controlled, credible way.
                  </p>
                  <div class="hero-tech-intro">
                    <p class="hero-tech-intro-text">
                      The technology story starts here: Fluidstream is not trying to avoid liquid presence at all costs.
                      It is designed
                      around the fact that liquids can enter the compression process and must be handled in a controlled,
                      credible way.
                    </p>

                    <div class="hero-patent-callout">
                      <p class="hero-patent-callout-text">
                        <strong>Patent reference:</strong> US11098709B2 supports this liquid-aware compression methodology
                        and links directly to Fluidstream’s approach to chamber response under multiphase conditions.
                      </p>
                    </div>
                  </div>

                </div>
                <div class="feature-body">
                  <h4>Why it matters technically</h4>
                  <p>
                    In conventional compression, liquids are treated as a threat that must be removed before the machine
                    can
                    run safely. That assumption drives the need for scrubbers, separators, and additional process steps.
                    Fluidstream’s methodology changes that architecture by designing for liquid presence inside the
                    compression chamber. This is a more realistic fit for vapor recovery streams, casing gas with
                    carryover,
                    and multiphase production services where liquid breakthrough is not an exception but part of the
                    normal
                    operating envelope.
                  </p>
                  <p>
                    By handling incompressible liquids inside the compression process, the system can reduce dependence on
                    separation hardware as the only line of defense. That does not just simplify the facility. It also
                    changes the reliability story, because the machine is not destabilized every time the field behaves
                    like
                    a field instead of a clean laboratory stream.
                  </p>
                  <div class="bullets">
                    <div class="bullet">
                      <strong>Built for mixed flow conditions</strong>
                      <span>Supports operation where gas, liquids, and transient slug behavior are part of real
                        service.</span>
                    </div>
                    <div class="bullet">
                      <strong>Less reliance on upstream cleanup</strong>
                      <span>Helps reduce the amount of equipment required to protect a gas-only compressor from liquid
                        carryover.</span>
                    </div>
                    <div class="bullet">
                      <strong>Broader application range</strong>
                      <span>Improved economics can make multiphase deployment practical in more wells, pads, and facility
                        scenarios.</span>
                    </div>
                    <div class="bullet">
                      <strong>Stronger field realism</strong>
                      <span>The design philosophy starts from real production variability instead of idealized process
                        assumptions.</span>
                    </div>
                  </div>
                  <div class="adv">
                    <strong>Real-life benefit</strong>
                    Operators gain a production-moving solution that remains useful when liquid carryover, changing
                    gas-liquid ratios, or unstable inflow would otherwise force a conventional system into trips,
                    workarounds, or additional facility spend.
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>

        <div class="">
          <div class="container">
            <article class="feature" id="gland-section">
              <div class="feature-inner">
                <div class="feature-intro">
                  <span class="kicker mb-2">Advanced sealing system</span>
                  <h3>Patent-pending gland sealing with electronic wear detection.</h3>
                  <p>
                    Sealing performance is one of the most consequential reliability issues in multiphase compression.
                    Fluidstream addresses it as a central technology layer, not as an afterthought.
                  </p>
                </div>
                <div class="feature-body">
                  <h4>Why it matters technically</h4>
                  <p>
                    Mixed-phase service is hard on sealing systems because the machine must tolerate not only pressure
                    differential and cycle loading, but also contaminants, liquid exposure, and changing process behavior.
                    Fluidstream’s gland sealing configuration is paired with electronic wear detection so the operator has
                    visibility into seal condition before sealing degradation turns into a leak event, an emergency
                    intervention, or an extended outage.
                  </p>
                  <p>
                    This matters because predictive awareness is often more valuable than simply having a durable seal on
                    paper. In field operations, downtime is rarely caused by a single weak component in isolation. It is
                    caused by a lack of warning, a reactive maintenance pattern, and the inability to plan service before
                    a
                    problem becomes operationally expensive.
                  </p>
                  <div class="bullets">
                    <div class="bullet">
                      <strong>Wear visibility</strong>
                      <span>Electronic detection improves awareness of seal condition before failure becomes
                        disruptive.</span>
                    </div>
                    <div class="bullet">
                      <strong>Improved maintenance planning</strong>
                      <span>Helps shift service from reactive troubleshooting toward scheduled intervention.</span>
                    </div>
                    <div class="bullet">
                      <strong>Better reliability in harsh duty</strong>
                      <span>Supports sustained operation under demanding multiphase conditions where sealing is a common
                        weak point.</span>
                    </div>
                    <div class="bullet">
                      <strong>Lower leak exposure</strong>
                      <span>Stronger sealing integrity helps reduce one of the highest-concern failure modes in multiphase
                        equipment.</span>
                    </div>
                  </div>
                  <div class="adv">
                    <strong>Real-life benefit</strong>
                    Instead of discovering a seal problem only after leakage, downtime, or emergency service, operators
                    gain
                    earlier warning and a better chance to protect uptime, maintenance budgets, and site safety
                    performance.
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>

        <div class="gray">
          <div class="container">
            <article class="feature" id="alignment-section">
              <div class="feature-inner">
                <div class="feature-intro">
                  <span class="kicker mb-2">Containment and mechanical integrity</span>
                  <h3>Sealed hazardous-fluid containment and alignment in critical wear areas.</h3>
                  <p>
                    Reliability in multiphase service is not only about what the machine compresses. It is also about how
                    the machine holds alignment, controls wear, and contains the fluid in the areas where failure risk is
                    concentrated.
                  </p>
                </div>
                <div class="feature-body">
                  <h4>Why it matters technically</h4>
                  <p>
                    The live Fluidstream messaging points to a completely sealed gland for hazardous fluids and to
                    alignment
                    in key stress and wear zones. Those two ideas are tightly connected. Poor mechanical stability
                    accelerates wear in sealing areas. Sealing degradation increases exposure risk and shortens component
                    life. Fluidstream’s approach addresses both together by pairing containment with structural control in
                    the wear-critical zones of the machine.
                  </p>
                  <p>
                    This becomes especially important when the stream contains corrosive components such as H₂S, when the
                    service is remote and intervention is expensive, or when the production system cannot tolerate
                    repeated
                    small failures across seals, guides, and wear components.
                  </p>
                  <div class="bullets">
                    <div class="bullet">
                      <strong>Hazardous-fluid containment</strong>
                      <span>Supports safer operation in services where exposure to corrosive or toxic fluids is a real
                        design concern.</span>
                    </div>
                    <div class="bullet">
                      <strong>Alignment control</strong>
                      <span>Helps preserve seal life and reduce mechanically induced wear in critical load paths.</span>
                    </div>
                    <div class="bullet">
                      <strong>Longer component life</strong>
                      <span>Wear control in stressed areas helps extend intervals between service events and part
                        replacement.</span>
                    </div>
                    <div class="bullet">
                      <strong>Durability under demanding duty</strong>
                      <span>Improves survivability when field conditions are corrosive, unstable, or maintenance access is
                        limited.</span>
                    </div>
                  </div>
                  <div class="adv">
                    <strong>Real-life benefit</strong>
                    The operator is not only buying compression capacity. They are buying a machine architecture that is
                    more likely to stay sealed, stay aligned, and stay productive when the service environment is harsh
                    and
                    the cost of intervention is high.
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="">
          <div class="container">
            <article class="feature" id="tracking-section">
              <div class="feature-inner">
                <div class="feature-intro">
                  <span class="kicker mb-2">Piston tracking and adaptive operation</span>
                  <h3>Full piston tracking for optimized control and upset protection.</h3>
                  <p>
                    Real field equipment is rarely exposed to perfectly steady operating conditions. Controls must respond
                    to what the machine is experiencing, not just what the process was expected to be.
                  </p>
                </div>
                <div class="feature-body">
                  <h4>Why it matters technically</h4>
                  <p>
                    Full piston tracking helps prevent damage from ice and solids buildup, optimizes power fluid
                    temperature, and adjusts the system for upset conditions such as slugs. It is a core part of the
                    machine’s protection strategy. Tracking piston behavior gives the control system better operating
                    context, allowing the unit to respond to harmful conditions before they cascade into mechanical
                    stress,
                    poor efficiency, or instability.
                  </p>
                  <p>
                    This is particularly relevant in multiphase services because the most expensive failures often do not
                    begin with a catastrophic event. They begin with changing behavior: higher loads, altered motion,
                    unstable response, and increasingly unfavorable operating conditions that go unmanaged for too long.
                  </p>
                  <div class="bullets">
                    <div class="bullet">
                      <strong>Upset response</strong>
                      <span>Supports operational adjustment when slugs, solids buildup, or transient events begin to
                        affect
                        the machine.</span>
                    </div>
                    <div class="bullet">
                      <strong>Protection against damage modes</strong>
                      <span>Helps reduce risk from ice formation, solids accumulation, and other non-ideal operating
                        behavior.</span>
                    </div>
                    <div class="bullet">
                      <strong>Optimized operating envelope</strong>
                      <span>Improves the system’s ability to remain controlled as conditions change instead of relying on
                        a
                        narrow design point.</span>
                    </div>
                    <div class="bullet">
                      <strong>More credible autonomy</strong>
                      <span>Autonomous performance is stronger when the controls have better real-time awareness of
                        machine
                        behavior.</span>
                    </div>
                  </div>
                  <div class="adv">
                    <strong>Real-life benefit</strong>
                    In the field, this means less dependence on constant manual tuning and a better chance of staying
                    online
                    through the conditions that normally create trips, damage, and operator frustration.
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="gray">
          <div class="container">
            <article class="feature" id="drives-section">
              <div class="feature-inner">
                <div class="feature-intro">
                  <span class="kicker mb-2">Drive systems and controls</span>
                  <h3>Electric standard, gas drive optional, fully integrated into autonomous controls.</h3>
                  <p>
                    Deployment flexibility only becomes valuable when it does not compromise control quality. Fluidstream
                    links the drive options back into the operating logic so the system remains coherent under different
                    field constraints.
                  </p>
                </div>
                <div class="feature-body">
                  <h4>Why it matters technically</h4>
                  <p>
                    Fluidstream offers both electric and gas-drive configurations, but the more important point is that
                    critical gas-drive operating data such as oil temperature, rpm, and motor load are integrated into the
                    control system. That means the drive package is not treated as a separate black box. It becomes part
                    of
                    the system’s protective intelligence and operating strategy.
                  </p>
                  <p>
                    This is a practical advantage in remote and infrastructure-limited deployments where available power
                    can
                    shape the entire project. Operators often need a solution that can work with site realities without
                    sacrificing the automation and protection needed for reliable performance.
                  </p>
                  <div class="bullets">
                    <div class="bullet">
                      <strong>Deployment flexibility</strong>
                      <span>Supports both electric-powered and gas-driven field installations depending on site
                        constraints.</span>
                    </div>
                    <div class="bullet">
                      <strong>Integrated operating data</strong>
                      <span>Drive information is used by the controls rather than left disconnected from system
                        logic.</span>
                    </div>
                    <div class="bullet">
                      <strong>Better performance under variable fuel quality</strong>
                      <span>Control integration helps the unit remain functional even when fuel gas quality is not
                        ideal.</span>
                    </div>
                    <div class="bullet">
                      <strong>Reduced operator burden</strong>
                      <span>Autonomous logic supports reliable operation without requiring constant manual attention or
                        intervention.</span>
                    </div>
                  </div>
                  <div class="adv">
                    <strong>Real-life benefit</strong>
                    Operators can deploy the technology in more places, including sites without ideal electric
                    infrastructure, while still keeping the control quality and protection logic needed for serious field
                    service.
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>

        <div class="">
          <div class="container">
            <article class="feature" id="sand-section">
              <div class="feature-inner">
                <div class="feature-intro">
                  <span class="kicker mb-2">Sand-ready sealing</span>
                  <h3>Multiphase piston and gland sealing configured to optimize life in sand service.</h3>
                  <p>
                    Abrasive service is where many technologies stop sounding robust and start showing their limitations.
                    Fluidstream explicitly addresses survivability in sand-bearing applications.
                  </p>
                </div>
                <div class="feature-body">
                  <h4>Why it matters technically</h4>
                  <p>
                    Sand and other abrasive solids accelerate wear in sealing surfaces, moving interfaces, and other
                    mechanically sensitive areas. A technology that claims to be multiphase-capable but assumes a clean
                    stream is still vulnerable where the field is dirtiest. Fluidstream’s multiphase piston sealing and
                    gland sealing approach is configured to optimize life under abrasive service, reinforcing that the
                    machine is intended for real operating conditions rather than idealized cases.
                  </p>
                  <p>
                    That matters not only for equipment life but also for economics. Abrasive wear does not just consume
                    parts. It creates more frequent shutdowns, more service visits, and more uncertainty around operating
                    continuity. Designing for sand service helps protect the economic case for the technology in wells and
                    facilities where conventional assumptions break down fastest.
                  </p>
                  <div class="bullets">
                    <div class="bullet">
                      <strong>Abrasive-duty survivability</strong>
                      <span>Sealing philosophy is configured with solids-bearing service in mind, not as an after-the-fact
                        tolerance claim.</span>
                    </div>
                    <div class="bullet">
                      <strong>Optimized seal life</strong>
                      <span>Targets one of the first areas to degrade when abrasive material is present in the
                        stream.</span>
                    </div>
                    <div class="bullet">
                      <strong>Stronger suitability for difficult wells</strong>
                      <span>Supports applications where sand, contaminated fluids, and unstable production conditions
                        coexist.</span>
                    </div>
                    <div class="bullet">
                      <strong>Improved lifecycle economics</strong>
                      <span>Lower wear intensity can reduce service frequency and help preserve uptime.</span>
                    </div>
                  </div>
                  <div class="adv">
                    <strong>Real-life benefit</strong>
                    The technology is better positioned for the wells and facilities that are hardest to keep online,
                    where
                    abrasive solids can quickly erase the economics of a less field-ready design.
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="section section-surface-white py-12" id="differentiation">
    <div class="container">
      <div class="kicker mb-2 py-4">Technology Differentiation</div>
      <h2 class="section-title">Designed to feel proprietary, precise, and operator-ready</h2>
      <p class="pp">The page keeps the earlier differentiation structure while sharpening the message around
        direct liquid handling, fully sealed containment, autonomous control, and hard-duty multiphase operation.</p>

      <div class="diff-grid">
        <div class="diff-card">
          <h3>Designed for Multiphase Not Adapted to It</h3>
          <p>Fluidstream is engineered specifically for multiphase flow, not repurposed from conventional compression
            architectures.</p>
        </div>

        <div class="diff-card">
          <h3>Sealed. Controlled. Predictable.</h3>
          <p>Advanced gland sealing, wear detection, and autonomous control remove major operational risks found in
            competing systems.</p>
        </div>

        <div class="diff-card">
          <h3>Handles Variability Without Compromise</h3>
          <p>From incompressible liquids and slugs to solids, sand, and unstable gas-drive conditions, the system is built
            for real field variation.</p>
        </div>

        <div class="diff-card">
          <h3>Lower Maintenance by Design</h3>
          <p>Alignment control, wear-focused sealing, and autonomous operation all work together to reduce service burden
            and extend component life.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="fs-technology-cta" aria-labelledby="technology-cta-title">
    <div class="fs-technology-cta__inner">
      <div class="fs-technology-cta__copy">
        <span class="fs-technology-cta__eyebrow">Request technical review</span>

        <h2 id="technology-cta-title">
          Find out whether Fluidstream technology fits your field conditions.
        </h2>

        <p>
          Use Fluidstream’s technical review when liquids, unstable flow, restart issues, solids, or separation-first
          complexity are limiting compression reliability, uptime, or project economics.
        </p>
      </div>

      <div class="fs-technology-cta__actions" aria-label="Technology review actions">
        <a class="fs-btn fs-btn--primary" href="{{ url('/contact') }}">
          Request Technical Review
        </a>

        <a class="fs-btn fs-btn--secondary" href="{{ url('/multiphase-compression-technology') }}">
          View Multiphase Technology
        </a>
      </div>
    </div>
  </section>
  <button id="scrollToStageBtn" class="scroll-to-stage-btn" type="button" aria-label="Scroll to image section">
    <svg viewBox="0 0 24 24" fill="none" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
      <path d="M12 19V5"></path>
      <path d="M5 12l7-7 7 7"></path>
    </svg>
  </button>
  <script>
    const featureTargets = {
      liquid: "liquid-method",
      gland: "gland-section",
      alignment: "alignment-section",
      tracking: "tracking-section",
      drives: "drives-section",
      sand: "sand-section"
    };

    const buttons = document.querySelectorAll(".hotspot");
    const overviewStage = document.getElementById("overview-stage");
    const scrollToStageBtn = document.getElementById("scrollToStageBtn");

    buttons.forEach((btn) => {
      btn.addEventListener("click", () => {
        const key = btn.dataset.feature;
        const targetId = featureTargets[key];
        const target = document.getElementById(targetId);

        buttons.forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");

        if (target) {
          const offset = 100;
          const top = target.getBoundingClientRect().top + window.pageYOffset - offset;

          window.scrollTo({
            top,
            behavior: "smooth"
          });
        }
      });
    });

    function toggleScrollToStageBtn() {
      if (!overviewStage || !scrollToStageBtn) return;

      const rect = overviewStage.getBoundingClientRect();
      const hasScrolledPastImageSection = rect.bottom < 120;

      if (hasScrolledPastImageSection) {
        scrollToStageBtn.classList.add("show");
      } else {
        scrollToStageBtn.classList.remove("show");
      }
    }

    if (scrollToStageBtn && overviewStage) {
      scrollToStageBtn.addEventListener("click", () => {
        const offset = 90;
        const top = overviewStage.getBoundingClientRect().top + window.pageYOffset - offset;

        window.scrollTo({
          top,
          behavior: "smooth"
        });
      });

      window.addEventListener("scroll", toggleScrollToStageBtn, { passive: true });
      window.addEventListener("load", toggleScrollToStageBtn);
    }
  </script>
  <script>
    const featureTargets = {
      liquid: "liquid-method",
      gland: "gland-section",
      alignment: "alignment-section",
      tracking: "tracking-section",
      drives: "drives-section",
      sand: "sand-section"
    };

    const buttons = document.querySelectorAll(".hotspot");

    buttons.forEach((btn) => {
      btn.addEventListener("click", () => {
        const key = btn.dataset.feature;
        const targetId = featureTargets[key];
        const target = document.getElementById(targetId);

        buttons.forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");

        if (target) {
          const offset = 100;
          const top = target.getBoundingClientRect().top + window.pageYOffset - offset;

          window.scrollTo({
            top,
            behavior: "smooth"
          });
        }
      });
    });
  </script>
@endsection