# Personalized News Feed Platform with AI Summarization & Recommendations

## Overview

This project is a **proof-of-concept (POC)** implementation of a personalized news feed platform that aggregates news articles from external sources and provides **AI-generated summaries** for each article.

Users can select their **topics of interest**, and the system delivers a **personalized feed of news articles with concise AI summaries**.

This implementation focuses on demonstrating **system architecture, data flow, and core logic** rather than building a fully featured production system.

---

# Key Features

### News Aggregation

* Fetch news articles from external APIs (e.g., NewsAPI)
* Store articles in the database

### AI Summarization

* Generate concise summaries using an AI provider
* Designed with abstraction to allow switching AI providers easily

### Personalized Feed

* Users select topics of interest
* Feed returns articles matching selected topics

### Scalable Architecture

* Service layer for business logic
* Event-driven design for decoupled processing
* Queue-ready AI summarization pipeline

---

# Tech Stack

Backend:

* PHP
* Laravel

Database:

* MySQL

External APIs:

* NewsAPI (for news ingestion)
* OpenAI API (for summarization)

Tools:

* Laravel HTTP Client
* Laravel Artisan Commands
* REST API

---

# System Architecture

## High-Level Architecture

External News API
↓
News Ingestion Service
↓
Database (Articles)
↓
AI Summarization Service
↓
Summaries Storage
↓
Personalized Feed API
↓
Frontend Client

---

# AI / Data Pipeline

News API
↓
Fetch Articles
↓
Store Raw Articles
↓
Send Article Content to AI Model
↓
Generate Summary
↓
Store Summary
↓
Serve Personalized Feed

---

# Data Model

## Users

Stores registered users.

| Column   | Type   |
| -------- | ------ |
| id       | bigint |
| name     | string |
| email    | string |
| password | string |

---

## Topics

| Column | Type   |
| ------ | ------ |
| id     | bigint |
| name   | string |

Examples:

* Technology
* AI
* Sports
* Finance

---

## User Topics

Maps users to their preferred topics.

| Column   | Type        |
| -------- | ----------- |
| id       | bigint      |
| user_id  | foreign key |
| topic_id | foreign key |

---

## Articles

| Column       | Type        |
| ------------ | ----------- |
| id           | bigint      |
| title        | string      |
| content      | text        |
| source       | string      |
| url          | string      |
| topic_id     | foreign key |
| published_at | timestamp   |

---

## Summaries

| Column     | Type        |
| ---------- | ----------- |
| id         | bigint      |
| article_id | foreign key |
| summary    | text        |

---

## Reading History

Tracks articles read by users.

| Column     | Type        |
| ---------- | ----------- |
| id         | bigint      |
| user_id    | foreign key |
| article_id | foreign key |
| read_at    | timestamp   |

---

# Project Structure

```
app
 ├── Console
 │   └── Commands
 │       ├── FetchNewsCommand.php
 │       └── GenerateSummaryCommand.php
 │
 ├── Http
 │   └── Controllers
 │       └── Api
 │           └── FeedController.php
 │
 ├── Models
 │   ├── Article.php
 │   ├── Topic.php
 │   ├── Summary.php
 │
 ├── Services
 │   ├── NewsService.php
 │   └── AISummaryService.php
 │
database
 ├── migrations
 └── seeders
 │
routes
 └── api.php
```

---

# API Endpoints

## Get Personalized Feed

GET /api/feed

Returns articles based on user topic preferences with AI summaries.

Example Response:

```
{
  "title": "AI Revolution in Healthcare",
  "summary": "AI is transforming healthcare through predictive diagnostics and automation."
}
```

---

# Setup Instructions

## Clone the repository

```
git clone https://github.com/yourusername/news-ai-feed.git
```

```
cd news-ai-feed
```

---

## Install Dependencies

```
composer install
```

---

## Environment Setup

Copy environment file:

```
cp .env.example .env
```

Generate application key:

```
php artisan key:generate
```

Add the following keys in `.env`:

```
NEWS_API_KEY=your_news_api_key
OPENAI_API_KEY=your_openai_key
```

---

## Database Setup

Run migrations:

```
php artisan migrate
```

Seed default topics:

```
php artisan db:seed
```

---

# Running the Application

Start Laravel server:

```
php artisan serve
```

---

# Fetch News Articles

```
php artisan news:fetch
```

This command pulls articles from the news API and stores them in the database.

---

# Generate AI Summaries

```
php artisan news:summarize
```

This command sends article content to the AI provider and stores generated summaries.

---

# Example Workflow

1. System fetches news articles from external APIs.
2. Articles are stored in the database.
3. AI service generates summaries for each article.
4. Users select their preferred topics.
5. Personalized feed API returns articles with summaries.

---

# Design Decisions

## Service Layer

Business logic is separated into services to keep controllers thin and maintainable.

## AI Provider Abstraction

AI integration is implemented via a service layer so that providers can be swapped easily.

## Queue-Ready Architecture

AI summarization can be moved to background jobs to improve scalability.

## Extensible News Providers

Multiple news sources can be integrated through a provider interface.

---

# Possible Improvements

* Implement Redis queues for AI processing
* Add caching layer for feeds
* Introduce Elasticsearch for article search
* Improve recommendation engine using ML
* Add real-time updates using WebSockets
* Implement collaborative filtering recommendations

---

# Limitations

This project is a **time-boxed prototype** and therefore includes simplified logic:

* Basic recommendation logic
* Minimal frontend implementation
* Simplified authentication

---

# Third-Party Services

News API
Used for fetching news articles.

OpenAI API
Used for generating article summaries.

---

# Future Enhancements

* Advanced recommendation algorithms
* Topic classification using NLP
* Vector embeddings for semantic search
* User behavior analytics

---

# Author

Mandar Dixit

Software Engineer (Laravel / Backend)

---

# Notes

This implementation focuses on demonstrating:

* clear architecture
* maintainable code structure
* AI integration
* scalable system design

rather than building a full production news platform.
