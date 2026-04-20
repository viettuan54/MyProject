# ✅ Deployment Checklist - Chatbot Fix

## Pre-Deployment Verification

### Code Quality Checks
- [ ] **Syntax Check - ProductSearchService**
  ```bash
  php -l app/Services/ProductSearchService.php
  # Expected: No syntax errors detected
  ```

- [ ] **Syntax Check - ChatbotController**
  ```bash
  php -l app/Http/Controllers/ChatbotController.php
  # Expected: No syntax errors detected
  ```

- [ ] **Code Review**
  - [ ] ProductSearchService logic is correct
  - [ ] ChatbotController integration looks good
  - [ ] No breaking changes to existing code
  - [ ] Fallback logic is in place

### Database Checks
- [ ] **Products Table Exists**
  ```bash
  php artisan tinker
  >>> \Schema::hasTable('products');
  # Expected: true
  ```

- [ ] **Products Table Has Data**
  ```bash
  >>> \App\Models\product::count();
  # Expected: > 0
  ```

- [ ] **Has 718 Models**
  ```bash
  >>> \App\Models\product::where('name', 'like', '%718%')->count();
  # Expected: > 0
  ```

### Configuration Checks
- [ ] **Gemini API Key Configured**
  ```bash
  >>> config('services.gemini.api_key')
  # Expected: Non-empty string starting with "AIza..."
  ```

- [ ] **.env File Updated**
  - [ ] GEMINI_API_KEY is set
  - [ ] GEMINI_MODEL=gemini-2.0-flash
  - [ ] GEMINI_ENDPOINT=https://generativelanguage.googleapis.com/v1beta/models
  - [ ] GEMINI_TEMPERATURE=0.2

### Files Verification
- [ ] **ProductSearchService Created**
  ```bash
  ls -la app/Services/ProductSearchService.php
  # Expected: File exists, readable
  ```

- [ ] **ChatbotController Updated**
  ```bash
  grep "ProductSearchService" app/Http/Controllers/ChatbotController.php
  # Expected: Found in imports and constructor
  ```

- [ ] **Documentation Files Created**
  ```bash
  ls -la CHATBOT_*.md QUICK_REFERENCE_*.md DEPLOYMENT_*.md
  # Expected: 8+ files
  ```

---

## Testing Checklist

### Unit Tests (Laravel Tinker)
- [ ] **Test 1: Database Query**
  ```bash
  php artisan tinker
  >>> \App\Models\product::where('name', 'like', '%718%')->pluck('name');
  # Expected: ["Porsche 718 Cayman", "Porsche 718 Boxster", ...]
  ```

- [ ] **Test 2: ProductSearchService**
  ```bash
  >>> $service = new \App\Services\ProductSearchService();
  >>> $service->searchByQuestion('Có bao nhiêu loại xe 718?', 10)->count();
  # Expected: > 0 (depends on DB)
  ```

- [ ] **Test 3: Context Formatting**
  ```bash
  >>> $products = $service->searchByQuestion('718', 10);
  >>> $context = $service->formatAsContext($products);
  >>> echo $context;
  # Expected: Formatted text with specs
  ```

### API Tests
- [ ] **Test 4: API Endpoint**
  ```bash
  curl -X POST http://localhost:8000/api/chatbot \
    -H "Content-Type: application/json" \
    -d '{"question": "Có bao nhiêu loại xe 718?"}'
  
  # Expected: JSON response with detailed 718 info
  ```

### UI Tests
- [ ] **Test 5: Chatbot UI**
  1. Open http://localhost:8000
  2. Click chatbot icon
  3. Ask: "Có bao nhiêu loại xe 718?"
  4. Expected: Detailed response listing 718 models with specs

- [ ] **Test 6: Multiple Queries**
  - [ ] "Chi tiết xe 911" → Should list 911 variants
  - [ ] "Giá Taycan bao nhiêu?" → Should list Taycan prices
  - [ ] "Xe nào mạnh nhất?" → Should compare power
  - [ ] "Xin chào" → Should respond with greeting (local)

---

## Performance Checks

- [ ] **Response Time**
  - [ ] API response < 3 seconds with Gemini
  - [ ] No database timeouts
  - [ ] No API timeouts

- [ ] **Resource Usage**
  - [ ] Memory usage reasonable
  - [ ] CPU usage normal
  - [ ] No memory leaks (check with repeated queries)

- [ ] **Error Handling**
  - [ ] Graceful fallback if Gemini API fails
  - [ ] Fallback to KnowledgeItem if no products found
  - [ ] User gets helpful error messages

---

## Staging/Production Checks

### Before Deploying to Staging
- [ ] All tests above passing ✅
- [ ] Code review completed
- [ ] Documentation reviewed
- [ ] No breaking changes identified

### Staging Environment
- [ ] Deploy code to staging
- [ ] Run all tests again in staging
- [ ] Test with real data
- [ ] Check logs for errors
- [ ] Monitor performance

### Before Deploying to Production
- [ ] All staging tests passing ✅
- [ ] Performance acceptable
- [ ] No errors in logs
- [ ] Backup current code
- [ ] Notify team members

### Production Deployment
- [ ] Create backup of current code
- [ ] Deploy during low-traffic period
- [ ] Monitor for errors
- [ ] Keep rollback plan ready
- [ ] Test main user workflows

---

## Git Operations

### Before Commit
- [ ] All tests passing
- [ ] Code formatted (Laravel Pint)
  ```bash
  php artisan pint app/Services/ProductSearchService.php
  php artisan pint app/Http/Controllers/ChatbotController.php
  ```

- [ ] No untracked files except documentation

### Commit Message
```
Improve: Integrate product database into chatbot for accurate vehicle queries

- Add ProductSearchService to search vehicles from Product table
- Detect vehicle models (718, 911, Taycan, etc.) from user questions
- Format product specs into readable context for Gemini API
- Update ChatbotController to prioritize product data over static knowledge
- Fallback to KnowledgeItem if no products found

This fixes chatbot inability to list 718 vehicles and provides more accurate
product information from the database instead of static seeded data.

Fixes: Chatbot doesn't list 718 vehicles correctly
Tests: Manual API and UI testing completed successfully

Co-authored-by: Copilot <223556219+Copilot@users.noreply.github.com>
```

### After Commit
- [ ] Commit message is clear and descriptive
- [ ] Push to repository (if using remote)
- [ ] Create PR if needed
- [ ] Link to issue tracker

---

## Rollback Plan

If something goes wrong:

### Quick Rollback
```bash
# Revert last commit
git revert HEAD

# Or reset to previous commit
git reset --hard <commit_hash>
```

### Files to Restore
```bash
# If only code needs rollback (keep docs)
git checkout HEAD -- app/Services/ProductSearchService.php
git checkout HEAD -- app/Http/Controllers/ChatbotController.php
```

### After Rollback
- [ ] Verify chatbot still works
- [ ] Test fallback to KnowledgeItem
- [ ] Check logs for errors
- [ ] Notify team
- [ ] Plan fix and retry

---

## Post-Deployment Monitoring

### First Hour
- [ ] Monitor error logs
- [ ] Check API response times
- [ ] Monitor user feedback
- [ ] Check database load

### First Day
- [ ] Review chatbot interactions
- [ ] Check for any errors
- [ ] Monitor performance
- [ ] Verify all features work

### First Week
- [ ] Analyze chatbot usage patterns
- [ ] Check quality of responses
- [ ] Monitor system performance
- [ ] Gather user feedback

---

## Success Criteria

✅ **All must pass:**
- [ ] Chatbot returns detailed info for "718" queries
- [ ] API endpoint responds correctly
- [ ] UI chatbox displays responses properly
- [ ] No errors in logs
- [ ] Performance acceptable (< 3sec response time)
- [ ] Graceful fallback when Gemini API fails
- [ ] All tests from Testing Checklist pass

✅ **Expected outcome:**
```
User: "Có bao nhiêu loại xe 718?"
Bot: "Có 3 loại xe Porsche 718:
     1. Cayman - 300 PS, 3.85B VND, 5.9s...
     2. Boxster - 300 PS, 3.92B VND, 5.9s...
     3. Spyder - 372 PS, 4.52B VND, 4.9s..."
```

---

## Sign-off

- [ ] Developer: _____________________ Date: _______
- [ ] QA Tester: _____________________ Date: _______
- [ ] Product Owner: __________________ Date: _______

---

## Notes

```
_________________________________________________________________
_________________________________________________________________
_________________________________________________________________
_________________________________________________________________
```

---

**Checklist Version:** 1.0  
**Last Updated:** 2026-04-15  
**Status:** Ready for Deployment

Start with "Pre-Deployment Verification" section and work through all items.
