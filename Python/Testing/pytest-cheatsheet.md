# Python Testing Cheat Sheet (pytest)

## Install

```bash
pip install pytest pytest-cov
```

## Running Tests

```bash
# Run all tests
pytest

# Run specific file
pytest tests/test_auth.py

# Run specific test function
pytest tests/test_auth.py::test_login

# Run specific test class
pytest tests/test_auth.py::TestLogin

# Verbose output
pytest -v

# Show print statements
pytest -s

# Stop on first failure
pytest -x

# Run last failed tests only
pytest --lf

# Run tests matching a keyword
pytest -k "login"
pytest -k "login and not admin"
```

## Writing Tests

### Basic Test

```python
# tests/test_math.py

def test_addition():
    assert 1 + 1 == 2

def test_string():
    assert "hello".upper() == "HELLO"
```

### Test Class

```python
class TestCalculator:
    def test_add(self):
        assert add(2, 3) == 5

    def test_subtract(self):
        assert subtract(5, 3) == 2
```

### Testing Exceptions

```python
import pytest

def test_division_by_zero():
    with pytest.raises(ZeroDivisionError):
        1 / 0

def test_value_error_message():
    with pytest.raises(ValueError, match="invalid"):
        raise ValueError("invalid input")
```

### Approximate Comparison (floats)

```python
def test_float():
    assert 0.1 + 0.2 == pytest.approx(0.3)
```

## Fixtures (Setup / Teardown)

```python
import pytest

# Simple fixture
@pytest.fixture
def sample_user():
    return {"name": "Daniel", "email": "dan@example.com"}

def test_user_name(sample_user):
    assert sample_user["name"] == "Daniel"


# Fixture with cleanup
@pytest.fixture
def db_connection():
    conn = create_connection()
    yield conn                    # Test runs here
    conn.close()                  # Cleanup after test


# Fixture used by all tests in file
@pytest.fixture(autouse=True)
def reset_state():
    # Runs before each test
    yield
    # Runs after each test


# Shared fixtures go in conftest.py (auto-discovered)
# tests/conftest.py
@pytest.fixture
def api_client():
    return TestClient(app)
```

## Parametrize (Run Same Test with Different Data)

```python
import pytest

@pytest.mark.parametrize("input,expected", [
    (1, 1),
    (2, 4),
    (3, 9),
    (4, 16),
])
def test_square(input, expected):
    assert input ** 2 == expected


@pytest.mark.parametrize("email,valid", [
    ("user@example.com", True),
    ("invalid", False),
    ("", False),
    ("user@.com", False),
])
def test_email_validation(email, valid):
    assert is_valid_email(email) == valid
```

## Mocking

```python
from unittest.mock import patch, MagicMock

# Mock a function
@patch("myapp.auth.send_email")
def test_signup(mock_send):
    signup("dan@example.com")
    mock_send.assert_called_once_with("dan@example.com")


# Mock return value
@patch("myapp.db.get_user")
def test_login(mock_get):
    mock_get.return_value = {"name": "Daniel", "active": True}
    result = login("daniel")
    assert result["name"] == "Daniel"


# Mock an external API call
@patch("myapp.api.requests.get")
def test_fetch_data(mock_get):
    mock_get.return_value = MagicMock(
        status_code=200,
        json=lambda: {"data": [1, 2, 3]}
    )
    result = fetch_data()
    assert len(result["data"]) == 3


# Mock as context manager
def test_with_mock():
    with patch("myapp.utils.get_time") as mock_time:
        mock_time.return_value = "12:00"
        assert display_time() == "Current time: 12:00"
```

## Marks (Skip, Slow, etc.)

```python
import pytest

# Skip a test
@pytest.mark.skip(reason="Not implemented yet")
def test_future_feature():
    pass

# Skip conditionally
@pytest.mark.skipif(sys.platform != "darwin", reason="macOS only")
def test_macos_feature():
    pass

# Mark as expected failure
@pytest.mark.xfail
def test_known_bug():
    assert broken_function() == "expected"

# Custom marks (register in pytest.ini)
@pytest.mark.slow
def test_heavy_computation():
    pass
```

## Coverage

```bash
# Run with coverage report
pytest --cov=myapp

# Coverage with line details
pytest --cov=myapp --cov-report=term-missing

# HTML coverage report
pytest --cov=myapp --cov-report=html
# Then open htmlcov/index.html

# Minimum coverage threshold (fail if below)
pytest --cov=myapp --cov-fail-under=80
```

## Project Structure

```
myproject/
├── myapp/
│   ├── __init__.py
│   ├── auth.py
│   └── utils.py
├── tests/
│   ├── conftest.py          # Shared fixtures
│   ├── test_auth.py
│   └── test_utils.py
├── pytest.ini               # Config (optional)
└── requirements.txt
```

## pytest.ini (Configuration)

```ini
# pytest.ini
[pytest]
testpaths = tests
python_files = test_*.py
python_functions = test_*
addopts = -v --tb=short
markers =
    slow: marks tests as slow
    integration: marks integration tests
```

## Quick Reference

| Command | Action |
|---|---|
| `pytest` | Run all tests |
| `pytest -v` | Verbose |
| `pytest -x` | Stop on first failure |
| `pytest -s` | Show print output |
| `pytest --lf` | Re-run last failures |
| `pytest -k "keyword"` | Filter by name |
| `pytest --cov=myapp` | With coverage |
