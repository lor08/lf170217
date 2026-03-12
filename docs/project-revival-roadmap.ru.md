# LF170217 — план перезапуска и пересборки проекта

## 1) Что это за проект

Проект — это футбольный медиапортал (новости, видео, загрузки, онлайн-матчи и трансляции) на Laravel 5.4.

Ключевые пользовательские разделы:
- Главная с блоками последних новостей/видео/загрузок.
- Новости (список + карточка материала).
- Видео (список + карточка материала).
- Загрузки (список + карточка файла/материала).
- Онлайн-матчи и страницы матчей/трансляций.

Текущий источник контента частично формируется грабберами (например, чемпионатные новости/календари и legacy-потоки).

## 2) Что уже есть сильного

- Нормальная доменная база под футбол: `countries`, `leagues`, `clubs`, `matches`, `chanels`.
- Отдельные сущности контента: `news`, `videos`, `loads`, `files`.
- Категоризация и теги как кросс-сущностная модель (через morph-отношения).
- Админка на SleepingOwl для ручного редактирования.
- Событийная инкрементация просмотров (`MaterialHasViewed` + listener `Counter`).
- Кэширование популярных фронтовых выборок.

## 3) Технический долг и риски

- Устаревший стек: PHP >=5.6, Laravel 5.4, старый Laravel Mix/Webpack.
- Источники парсинга хрупкие и завязаны на HTML-структуры сайтов.
- В роутинге остались технические/временные маршруты (`clear-cache`, `test`, служебные import-блоки).
- Смешение предметных зон (редакционный контент + расписания/стримы) без явного bounded context.
- Почти нет тестового покрытия бизнес-функций.
- Потенциальные security gaps (динамические источники, legacy обработка iframe/txt потоков).

## 4) Целевое состояние (Modern + AI-first)

### Архитектура
- Backend API-first (Laravel 11+ или NestJS/FastAPI), фронт отдельно (Next.js/Nuxt).
- Четкие модули:
  1. Content (news/video/downloads/pages)
  2. Football Core (countries/leagues/clubs/matches)
  3. Ingestion (коннекторы к источникам)
  4. AI Pipeline (перевод, суммаризация, категоризация, дедупликация)
  5. Delivery (site + Telegram + RSS + push)

### Контент и источники
- Добавить зарубежные источники через официальный API/лицензируемые фиды.
- Ввести ingestion-слой с нормализацией в единый формат `RawItem -> NormalizedItem -> PublishedItem`.
- Детектор дублей: `simhash`/`embeddings` + правила по заголовку/дате/источнику.

### AI-возможности
- Автоперевод EN/ES/DE/FR -> RU с пост-редактированием стилем редакции.
- AI-суммаризация для коротких карточек.
- AI-теги/рубрикатор (модель + fallback rules).
- Генерация SEO-мета и alt-текстов.
- Режим «человек в контуре»: публикация только после валидации редактором (вначале).

## 5) Практичный roadmap с нуля (без наследования legacy-кода)

## Phase 0 — Discovery (1–2 недели)
- Описать продуктовые цели: KPI (DAU, depth, CTR, retention).
- Зафиксировать legal/policy по источникам и переводу.
- Описать контент-модель и workflow редакции.

**Артефакты:** PRD, Data Contract v1, Source Policy.

## Phase 1 — Foundation (2 недели)
- Поднять новый репозиторий (mono-repo): `apps/api`, `apps/web`, `apps/worker`.
- База: PostgreSQL + Redis, object storage для медиа.
- CI/CD, observability (Sentry + OpenTelemetry), feature flags.
- Базовая auth + roles (editor/admin).

## Phase 2 — Core CMS + Football Domain (3–4 недели)
- Реализовать сущности: Article, Video, Download, Category, Tag, Match, League, Club, Country.
- Ввести статусный pipeline: `draft -> reviewed -> published`.
- Реализовать API и админ-интерфейс для редакции.

## Phase 3 — Ingestion v1 (3 недели)
- Коннекторы к 2–3 источникам (лучше API-first).
- Очереди задач + ретраи + dead-letter.
- Нормализация, дедупликация, provenance (сохранение source metadata).

## Phase 4 — AI v1 (3 недели)
- Перевод pipeline с quality gates.
- Суммаризация и авто-теги.
- Модель качества: оценка длины, factual checks, banned-слова, score.

## Phase 5 — Frontend v1 (3 недели)
- Современный фронт (Next.js): homepage, article/video/download pages, match center.
- ISR/SSR, image optimization, web vitals, structured data.
- RU-first UX + подготовка к многоязычности.

## Phase 6 — Launch & Growth (2 недели)
- Soft launch, A/B заголовков и карточек.
- Telegram/Push каналы.
- Контент-аналитика: конверсия по рубрикам и источникам.

## 6) MVP-срез (чтобы не растянуть)

Для первого релиза оставить:
- Новости + видео (без сложных live-стримов).
- 2 иностранных источника + RU перевод.
- Ручная модерация AI-результатов.
- Базовые рекомендации «похожее по теме».

Отложить:
- Полноценный матч-центр с каналами трансляций.
- Сложный персональный recommendation engine.

## 7) Миграция данных из legacy

- Выгрузить текущие `news/videos/loads/categories/tags` в JSONL.
- Прогнать через новый normalizer, сохранить mapping `legacy_id -> new_id`.
- Перенести медиа и пересобрать URL.
- Проверить SEO-редиректы (301) со старых маршрутов.

## 8) Рекомендованный стек (прагматично)

- **API:** Laravel 11 + PHP 8.3 (или NestJS, если хотите TS end-to-end).
- **Web:** Next.js 14/15 + TypeScript.
- **Workers:** Laravel Queues / Temporal / BullMQ.
- **DB:** PostgreSQL, Redis.
- **AI:** OpenAI + fallback провайдер; Langfuse/Helicone для наблюдаемости prompt-цепочек.
- **Search:** Meilisearch/OpenSearch.

## 9) Команда и роли (минимум)

- 1x backend
- 1x frontend
- 1x data/ingestion engineer
- 1x product/editor
- 0.5x DevOps/SRE

## 10) Критерии “сделано правильно”

- >95% ingestion jobs проходят без ручного вмешательства.
- MTTR по сбою источника < 2 часа.
- Время публикации материала от поступления до review < 15 минут.
- Core Web Vitals в green zone.
- Стабильная модерация AI-переводов (ошибки < согласованного SLA).

---

## Короткая рекомендация

Если цель — «сделать правильно сразу», лучше не апгрейдить этот Laravel 5.4 in-place, а строить новый проект рядом с четкой data-contract архитектурой и ingestion/AI пайплайнами. Legacy использовать как источник исторических данных и как reference по предметной области.
